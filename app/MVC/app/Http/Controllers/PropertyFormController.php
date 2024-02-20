<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use App\Models\Configuracio_Servei;
use App\Models\Reserva;
use App\Models\Servei;
use Couchbase\RegexpSearchQuery;
use Illuminate\Http\Request;
use App\Models\Traduccio;
use App\Models\Propietat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
    public function getPropietat($id) {
        $propietat = Propietat::find($id);
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
        $traduccioNom = Traduccio::where('code', $request -> nameCode) -> where('lang', "es") -> first();
        $traduccioDesc = Traduccio::where('code', $request -> descCode) -> where('lang', "es") -> first();

        $traduccioNom -> value = $request -> nombre;
        $traduccioDesc -> value = $request -> descripcion;

        $traduccioNom -> save();
        $traduccioDesc -> save();

        return redirect(route('property.edit', ['id' => $request -> id])) -> with('success', 'Actualizado');
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
        return view('property/propertyCalendar', ['id' => $request -> id], compact('dates'));
    }

    public function findAllDatesReservades(Request $request) {
        $reserves = Reserva::where('propietat_id', $request -> id) -> get();
        $datesReservades = [];

        foreach ($reserves as $reserva) {
            $dataF = $reserva->data_fi;
            $dataI = $reserva->data_inici;

            $datesReservades[] = $this -> date_range($dataI, $dataF);
        }

        return $datesReservades;
    }

    private function date_range($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

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

        $id = $request->session()->get('idPropiedad');
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
        var_dump(count($request->all()));


    }
}
