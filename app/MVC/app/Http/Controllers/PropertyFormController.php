<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use Illuminate\Http\Request;
use App\Models\Traduccio;
use App\Models\Propietat;
use Illuminate\Support\Facades\DB;

class PropertyFormController extends Controller {

    public function getPropietat($id) {
        $propietat = Propietat::find($id);
        $ciutats = $this->findAllCiutats();
        $traduccions = $this -> findTraduccions($propietat -> descripcio, $propietat -> nom);
        $traduccioNom = $traduccions[0];
        $traduccioDesc = $traduccions[1];
        return view("property/propertyInfo", compact("propietat",
            "ciutats", "traduccioNom", "traduccioDesc"));
    }
    public function loadForm() {
        $ciutats = $this -> findAllCiutats();
        return view("property/propertyForm", compact("ciutats"));
    }

    public function findAllCiutats() {
        $ciutats = Ciutat::all();
        return $ciutats;
    }

    private function findTraduccions($descCode, $titleCode) {
        $traduccioNom = Traduccio::where('code', $titleCode) -> get();
        $traduccioDesc = Traduccio::where('code', $descCode)  -> get();

        return [$traduccioNom, $traduccioDesc];
    }

    private function updatePropietat(Request $request) {
        $nom = $request -> nombre;
        $desc = $request -> descripcion;

        //Traduccio::where('code')
    }
}
