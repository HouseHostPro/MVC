<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use App\Models\Configuracio;
use App\Models\Configuracio_Servei;
use App\Models\Espai;
use App\Models\Espai_Defecte;
use App\Models\Factura;
use App\Models\Imatge;
use App\Models\Imatge_Dormitori;
use App\Models\Periode_No_Disponible;
use App\Models\Plantilla;
use App\Models\PreuTemporada;
use App\Models\Propietat_Servei;
use App\Models\Reserva;
use App\Models\Servei;
use Carbon\Carbon;
use Couchbase\RegexpSearchQuery;
use Illuminate\Http\Request;
use App\Models\Traduccio;
use App\Models\Propietat;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class PropertyFormController extends Controller {


    //Propiedades
    public function findAllByUser() {
        $propietats = Propietat::where('usuari_id',Auth::user()->id) -> get();



        foreach ($propietats as $propietat) {

            $nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;
            $propietat -> nom = $nom;
        }

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
        $plantillas = Plantilla::all();
        $traduccioNom = $traduccions[0];
        $traduccioDesc = $traduccions[1];
        $urlImagen = $this->urlImage($request -> prop_id);
        return view("property/propertyInfo", compact("propietat",
            "ciutats", "traduccioNom", "traduccioDesc","plantillas","urlImagen"));
    }
    private function urlImage($id){

        $imagen = Imatge::where('propietat_id', $id)
            ->where('portada', 1)
            ->first();
        if($imagen){
            $url = Storage::disk('propiedades')->temporaryUrl(
                $imagen->url,
                Carbon::now()->addSeconds(30)
            );

            return $url;
        }else{
            return null;
        }


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

        var_dump($request->plantilla);

        Propietat::where('id', $request -> id) -> update(array('localitzacio' => $request -> ubi,'plantilla_id' => $request->plantilla));

        $traduccioNom -> value = $request -> nombre;
        $traduccioDesc -> value = $request -> descripcion;

        $traduccioNom -> save();
        $traduccioDesc -> save();

        Alert::success(__('Actualizado'), __(''));

        return redirect(route('property.edit', ['id' => $request -> casaId, 'prop_id' => $request -> id])) -> with('success', 'Actualizado');
    }

    private function idPropiedad($request){

        $url = $request->url();
        //Expresión regular para coger el número de la propiedad que se esá editando
        if (preg_match('/property\/(\d+)\/property/', $url, $matches)) {
            return $matches[1];
        }
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

        $id = $request -> prop_id;

        $dates = $this->findAllDatesReservades($request);
        $propietat = Propietat::find($id);
        $propietat -> nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;

        $preuBase = Configuracio::where(['propietat_id' => $id, 'clau' => 'preu_base']) -> first() -> valor;
        $disableDays = $this->findAllDatesDisabled($request);

        return view('property/propertyCalendar',compact('propietat','dates','preuBase','disableDays'));
    }

    public function savePriceForDay(Request $request){

        $id = $request -> prop_id;

        $configuracion = Configuracio::where('propietat_id', $id)
            ->where('clau', 'preu_base')
            ->first();
        if($configuracion){
            // Actualizar el valor
            $configuracion->valor = $request->precio_dia;
            $configuracion->save();
        }else{
            $config = new Configuracio();
            $config->propietat_id = $id;
            $config->clau = 'preu_base';
            $config->valor = $request->precio_dia;
            $config-> save();
        }
        return redirect() -> route('property.calendar',['id' => $request -> id, 'prop_id' => $id]);
    }

    public function saveDisableDays(Request $request){

        $id = $request -> prop_id;
        $from = $request -> from;
        $to = $request -> to;
        $fromFormateada = Carbon::createFromFormat('d/m/Y', $from)->toDateString();
        $toFormateada = Carbon::createFromFormat('d/m/Y', $to)->toDateString();

        $disableDays = new Periode_No_Disponible();
        $disableDays->data_inici = $fromFormateada;
        $disableDays->data_fi = $toFormateada;
        $disableDays->propietat_id = $id;
        $disableDays->save();


        return redirect() -> route('property.calendar',['id' => $request -> id, 'prop_id' => $id]);
    }
    public function deleteDisableDays(Request $request){

        $id = $request -> prop_id;
        $fecha_inicio = $request->fecha_inicio;

        $fechaFormateada = Carbon::createFromFormat('d/m/Y', $fecha_inicio)->format('Y-m-d');
        Periode_No_Disponible::where('propietat_id', $id)
            ->where('data_inici', $fechaFormateada)
            ->delete();

        return redirect() -> route('property.calendar',['id' => $request -> id, 'prop_id' => $id]);
    }

    public function findAllDatesDisabled(Request $request) {
        $disableDays = Periode_No_Disponible::where('propietat_id', $request -> id) -> get();
        $dates = [];

        if($disableDays->isEmpty()){

            return null;

        }else{

            foreach ($disableDays as $days) {
                $dataF = $days->data_fi;
                $dataI = $days->data_inici;

                $dates[] = $this -> dateRangeDMY($dataI, $dataF);
            }
            return $dates;
        }
    }


    public function findAllDatesReservades(Request $request) {
        $reserves = Reserva::where('propietat_id', $request -> id) -> get();
        $disableDays = $this->findAllDatesDisabled($request);
        if($disableDays !== null) {

            $allDisableDays = call_user_func_array('array_merge', $disableDays);

            $fechaFormateada = [];

            foreach ($allDisableDays as $day) {
                $fechaFormateada[] = Carbon::createFromFormat('d/m/Y', $day)->format('m/d/Y');
            }
        }

        $datesReservades = [];

        foreach ($reserves as $reserva) {
            $dataF = $reserva->data_fi;
            $dataI = $reserva->data_inici;

            $datesReservades[] = $this -> dateRangeMDY($dataI, $dataF);
        }
        $allReservas = call_user_func_array('array_merge', $datesReservades);

        if($disableDays !== null){

            $allReservasAndDisableDays = array_merge($allReservas,$fechaFormateada);
            return $allReservasAndDisableDays;
        }else{
            return $allReservas;
        }
    }

    private function dateRangeMDY($first, $last, $step = '+1 day', $output_format = 'm/d/Y' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
    }

    private function dateRangeDMY($first, $last, $step = '+1 day', $output_format = 'd/m/Y' ) {

        $dates = array();
        $current = strtotime($first);
        $last = strtotime($last);

        while( $current <= $last ) {

            $dates[] = date($output_format, $current);
            $current = strtotime($step, $current);
        }

        return $dates;
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


    //Servicios
    public function loadSevice(Request $request){

        $id = $this->idPropiedad($request);
        $servicios = Servei::all();

        $propietat = Propietat::find($id);
        $propietat -> nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;


        return view('property/serveiForm', compact('propietat','servicios'));
    }

    public function allService(){

        $servicios = Servei::all();

        return $servicios;
    }

    public function serviceByProperty(Request $request){

        $id = $request -> id;

        $servicios = Propietat_Servei::where('propietat_id',$id)->get();

        return $servicios;

    }

    public function saveService(Request $request){

        $id = $request -> prop_id;

        Propietat_Servei::where('propietat_id',$id)->delete();

        //Recorto el array que me llega del request, porque es de un form y el primer elemento es el token del form
        $servicios = array_slice($request->all(),1,count($request->all()));

        foreach ($servicios as $key => $value){

            $servicio = new Propietat_Servei();
            $idServei= explode("s-",$key)[1];

            $servicio->propietat_id = $id;
            $servicio->servei_id = $idServei;
            $servicio->quantitat = $value;

            $servicio -> save();
        }
        return redirect() -> route('property.service',['id' => $request -> id, 'prop_id' => $id]);
    }

    //Espacios

    public function loadEspacios(Request $request){

        $id = $request -> prop_id;
        $servicios = Servei::all();

        $propietat = Propietat::find($id);
        $propietat -> nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;

        $todosEspacios = $this -> allEspaciosAjax($request);
        foreach ($todosEspacios as $e) {
            $e -> tipus = __($e -> tipus);
        }

        $espaciosPropietat = $this -> espaciosByProperty($request);
        foreach ($espaciosPropietat as $e) {
            $e -> tipus = __($e -> tipus);
        }

        return view('property/espaiForm', compact('propietat','servicios', 'todosEspacios', 'espaciosPropietat'));
    }
    public function allEspaciosAjax(Request $request){

        $espacios = Espai_Defecte::all();

        return $espacios;
    }

    public function espaciosByProperty(Request $request){

        $id = $request -> id;

        $servicios = Espai::where('propietat_id',$id)->with('espacios_defecto')->get();

        return $servicios;

    }

    public function saveEspacios(Request $request){

        $idProp = $request -> prop_id;

        Espai::where('propietat_id',$idProp)->delete();

        $espacios= array_slice($request->all(),1,count($request->all()));

        foreach ($espacios as $key => $value){

            if($key === "cd"){

                $this->insertEspacios($idProp,1,1,$value);

            }elseif ($key === "ci"){

                $this->insertEspacios($idProp,1,2,$value);

            }elseif ($key === "ci2"){

                $this->insertEspacios($idProp,1,3,$value);

            }else{
                $id= explode("s-",$key)[1];
                $this->insertEspacios($idProp,$id,NULL,$value);
            }
        }
        return redirect() -> route('espai.espais',['id' => $request -> id, 'prop_id' => $idProp]);
    }
    private function insertEspacios($idProp,$idEspacio,$idImagen,$cantidad){

        $espacio = new Espai();

        $espacio->propietat_id = $idProp;
        $espacio->espaid_id = $idEspacio;
        $espacio->imatge_id = $idImagen;
        $espacio->quantitat = $cantidad;

        $espacio->save();
    }

    //Normas
    public function loadNormas(Request $request){

        $id = $request -> prop_id;

        $propietat = Propietat::find($id);
        $propietat -> nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;

        return view('property/normasForm', compact('propietat'));
    }

    public function saveNormas(Request $request){

        $idProp = $request -> prop_id;

        $normas= array_slice($request->all(),1,count($request->all()));

        //Eliminar todas las normas
        Configuracio::where('propietat_id', $idProp)
        ->where('clau', 'like', 'norma_%')
        ->delete();

        //Le asigno el valor No en el caso de que no lleguen en la request, para después poderlo rellenar con la petición ajax
        if(!$request->has('mascotas')){
            $this->insertAndUpdateConfiguraio($idProp,'mascotas','No');
        }
        if(!$request->has('visitas')){
            $this->insertAndUpdateConfiguraio($idProp,'visitas','No');
        }
        if(!$request->has('fumar')){
            $this->insertAndUpdateConfiguraio($idProp,'fumar','No');
        }
        if(!$request->has('fiestas')){
            $this->insertAndUpdateConfiguraio($idProp,'fiestas','No');
        }

        foreach ($normas as $key => $value){

            var_dump("Clau ->" . $key . " Valor ->" . $value);

            $this->insertAndUpdateConfiguraio($idProp,$key,$value);
        }
        return redirect() -> route('property.normas',['id' => $request -> id, 'prop_id' => $idProp]);
    }

    private function insertAndUpdateConfiguraio($id,$clau,$valor){

        $configuracion = Configuracio::where('propietat_id', $id)
            ->where('clau', $clau)
            ->first();
        if($configuracion){
            // Actualizar el valor
            $configuracion->valor = $valor;
            $configuracion->save();
        }else{
            $config = new Configuracio();
            $config->propietat_id = $id;
            $config->clau = $clau;
            $config->valor = $valor;
            $config-> save();
        }

    }

    public function allNormasAjax(Request $request){

        $id = $request -> id;

        $normas = Configuracio::where('propietat_id',$id)->get();

        return $normas;
    }

    //Factura

    public function loadFactura(Request $request){

        $factura = Factura::where('reserva_id',$request->idFactura)->first();
        $nomPropietat = Traduccio::where('code', $factura -> nom_propietat) -> where('lang', app() -> getLocale()) -> first() -> value;

        return view('factura',compact('factura','nomPropietat'));
    }


}
