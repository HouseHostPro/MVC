<?php

namespace App\Http\Controllers;

use App\Models\DataLloguer;
use App\Models\Reserva;
use Illuminate\Http\Request;

class CasaController extends Controller{

    public function confirmacion(Request $request){

        $datosReserva = $request->all();
        return view('confirmacionReserva',compact('datosReserva'));
    }

    public function newReserva(Request $request){


        $reserva = new Reserva();
        $dataLloguer = new DataLloguer();

        $dataLloguer->data_inici = $request->input('frombd');
        $dataLloguer->data_fi = $request->input('tobd');


        $reserva->preu_total = $request->input('ptotal');
        $reserva->estat = 'PAGADA';
        $reserva->usuari_id = '1';
        $reserva->propietat_id = '1';

        $reserva -> save();

        return redirect('principal');


    }

}
