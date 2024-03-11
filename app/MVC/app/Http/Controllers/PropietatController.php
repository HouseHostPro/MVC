<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use App\Models\Propietat;
use App\Models\Traduccio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PropietatController extends Controller {
    public function findAllByUser() {
        $propietats = DB::table('propietat') -> where('usuari_id', '=' , 1) -> get();
        return view("property/properties", compact("propietats"));
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

    public function loadForm() {
        $ciutats = $this -> findAllCiutats();
        return view("property/propertyForm", compact("ciutats"));
    }

    public function findAllCiutats() {
        $ciutats = Ciutat::all();
        return $ciutats;
    }

    public function findTraduccions($descCode, $titleCode) {
        //return Traduccio::where('casa_id', $casa_id) -> first();
        $traduccioNom = Traduccio::where('code', $titleCode) -> get();
        $traduccioDesc = Traduccio::where('code', $descCode)  -> get();

        return [$traduccioNom, $traduccioDesc];
    }

    public function findTraduccionsById(Request $request) {
        //return Traduccio::where('casa_id', $casa_id) -> first();
        $traduccioNom = Traduccio::where('code', $request -> nom) -> get();
        $traduccioDesc = Traduccio::where('code', $request -> desc)  -> get();

        return [$traduccioNom, $traduccioDesc];
    }

    public function findNomTraduit(Request $request) {
        $propietat = Propietat::find($request -> id);
        return Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;
    }
}
