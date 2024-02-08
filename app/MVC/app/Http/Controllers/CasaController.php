<?php

namespace App\Http\Controllers;

use App\Models\Reserva;
use Illuminate\Http\Request;

class CasaController extends Controller{

    public function confirmacion(Request $request){

        $datosReserva = $request->all();
        return view('confirmacionReserva',compact('datosReserva'));
    }

    public function newReserva(Request $request){


        $reserva = new Reserva();

        $total = str_replace('€', '', $request -> input('total'));

        $reserva->preu_total = $total;
        $reserva->estat = 'PAGADA';
        $reserva->usuari_id = '1';
        $reserva->propietat_id = '1';
        $reserva->data_inici = $request -> input('frombd');
        $reserva->data_fi = $request -> input('tobd');

        $reserva -> save();

        return redirect() -> route('principal');


    }

}
