<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use App\Models\Configuracio;
use App\Models\Configuracio_Servei;
use App\Models\PreuTemporada;
use App\Models\Reserva;
use App\Models\Servei;
use Couchbase\RegexpSearchQuery;
use Illuminate\Http\Request;
use App\Models\Traduccio;
use App\Models\Propietat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyFormController extends Controller {


    //Propiedades
    public function findAllByUser() {
        $propietats = Propietat::where('usuari_id',Auth::user()->id) -> get();
        return view("property/properties", compact("propietats"));
    }
    public function AllProperties() {
        $propietats = Propietat::select('propietat.id','propietat.nom','ciutat.nom as nomCiutat')
            -> where('propietat.usuari_id',Auth::user()->id)
            -> join('ciutat','propietat.ciutat_id', '=', 'ciutat.id')
            ->get();

        return $propietats;
    }
    public function getPropietat(Request $request) {
        $propietat = Propietat::find($request -> prop_id);
        $ciutats = $this->findAllCiutats();
        $traduccions = $this -> findTraduccions($propietat -> descripcio, $propietat -> nom);
        $traduccioNom = $traduccions[0];
        $traduccioDesc = $traduccions[1];
        return view("property/propertyInfo", compact("propietat",
            "ciutats", "traduccioNom", "traduccioDesc"));
    }
    public function store(Request $request) {
        $property = new Propietat();
        $property -> nom = $request -> nombre_propiedad;
        $property -> localitzacio = $request -> ubicacion;
        $property -> m2 = $request -> m2;
        $property -> ciutat_id = $request -> ciudad;
        $property -> usuari_id = 1;

        $property -> save();
        $success = "Tu propiedad está casi lista! Ahora, añade algunos espacios";
        return redirect() -> route('espai.loadForm') -> with('success', $success);
    }

    public function updatePropietat(Request $request) {
        $traduccioNom = Traduccio::where('code', $request -> nameCode) -> where('lang', app()->getLocale()) -> first();
        $traduccioDesc = Traduccio::where('code', $request -> descCode) -> where('lang', app()->getLocale()) -> first();

        Propietat::where('id', $request -> id) -> update(array('localitzacio' => $request -> ubi));

        $traduccioNom -> value = $request -> nombre;
        $traduccioDesc -> value = $request -> descripcion;

        $traduccioNom -> save();
        $traduccioDesc -> save();

        Alert::success(__('Actualizado'), __(''));

        return redirect(route('property.edit', ['id' => $request -> casaId, 'prop_id' => $request -> id])) -> with('success', 'Actualizado');
    }

    //Ciudades
    public function loadForm() {
        $ciutats = $this -> findAllCiutats();
        return view("property/propertyForm", compact("ciutats"));
    }

    public function findAllCiutats() {
        $ciutats = Ciutat::all();
        return $ciutats;
    }

    //Traducciones
    private function findTraduccions($descCode, $titleCode) {
        $traduccioNom = Traduccio::where('code', $titleCode) -> get();
        $traduccioDesc = Traduccio::where('code', $descCode) -> get();

        return [$traduccioNom, $traduccioDesc];
    }

    //Calendario

    public function loadCalendar(Request $request) {
        $dates = $this->findAllDatesReservades($request);
        $temporades = PreuTemporada::where('configuracio_id', $request -> prop_id) -> get();
        $preusDies = [];

        foreach ($temporades as $temporada) {
            $preu = $temporada -> preu;
            $dies = $this -> dateRange($temporada -> data_inici, $temporada -> data_fi);
            $preusDies[] = new \stdClass($preu, $dies);
        }
        var_dump($preusDies);
        $preuBase = Configuracio::where(['propietat_id' => $request -> prop_id, 'clau' => 'preu_base']) -> first() -> valor;

        return view('property/propertyCalendar', ['id' => $request -> id], compact('dates','temporades' ,'preuBase'));
    }

    public function findAllDatesReservades(Request $request) {
        $reserves = Reserva::where('propietat_id', $request -> id) -> get();
        $datesReservades = [];

        foreach ($reserves as $reserva) {
            $dataF = $reserva->data_fi;
            $dataI = $reserva->data_inici;

            $datesReservades[] = $this -> dateRange($dataI, $dataF);
        }

        return $datesReservades;
    }

    private function dateRange($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }


    //Servicios
    public function loadSevice(Request $request){

        //$id = $request->session()->get('idPropiedad');
        $id = $request -> prop_id;
        $servicios = Servei::all();

        $propietat = Propietat::where('id', $id)->first();

        return view('property/serveiForm', compact('propietat','servicios'));
    }

    public function allService(){

        $servicios = Servei::all();

        return $servicios;
    }

    public function serviceByProperty(Request $request){

        $id = $request->session()->get('idPropiedad');

        $servicios = Configuracio_Servei::where('configuracio_id',$id)->get();

        return $servicios;

    }

    public function saveService(Request $request){

        $id = $request->session()->get('idPropiedad');

        Configuracio_Servei::where('configuracio_id',$id)->delete();

        $servicios = array_slice($request->all(),1,count($request->all()));

        foreach ($servicios as $key => $value){

            $servicio = new Configuracio_Servei();

            $servicio->configuracio_id =$id;
            $servicio->servei_id = $value;

            $servicio -> save();
        }
        $propietat = Propietat::where('id',$id) -> first();
        return view('property/serveiForm', compact('propietat'));
    }

    //Galeria

    public function loadGaleria(Request $request) {
        $propietat = Propietat::where('id', $request -> id) -> first();
        return view('galeria', compact('propietat'));
    }

    public function savePreuTemporada(Request $request) {
        $temporada = new PreuTemporada();
        $dInici = trim(explode('-', $request -> datePicker)[0]);
        var_dump($dInici);
        $temporada -> data_inici = date('Y-m-d', strtotime($dInici));
        var_dump($temporada -> data_inici);

        $dFi = trim(explode('-', $request -> datePicker)[1]);
        $temporada -> data_fi = date('Y-m-d', strtotime($dFi));

        $temporada -> preu = $request -> preu;
        $temporada -> configuracio_id = $request -> prop_id;

        $temporada -> save();

        Alert::success(__('Actualizado'), __(''));

        return redirect(route('property.calendar', ['id' => $request -> id, 'prop_id' => $request -> prop_id]));
    }
}
