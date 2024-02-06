<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CasaController extends Controller{

    public function confirmacion(Request $request){

        $datosReserva = $request->all();
        return view('confirmacionReserva',compact('datosReserva'));
    }

}
