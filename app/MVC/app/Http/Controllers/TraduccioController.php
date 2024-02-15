<?php

namespace App\Http\Controllers;

use App\Models\Traduccio;
use Illuminate\Http\Request;

class TraduccioController extends Controller {
    public function show() {
        $traduccio = Traduccio::where('_id', '=', 2) -> first();

        return view('traduccio', compact('traduccio'));
    }

    public function store(Request $request, $casa_id) {
        $traduccio = new Traduccio();
        $traduccio -> casa_id = $casa_id;
        $traduccio -> descripcio['es'] = $request -> descripcion;

        $traduccio -> save();
    }
}
