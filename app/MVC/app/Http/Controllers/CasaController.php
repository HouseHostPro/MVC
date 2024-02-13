<?php

namespace App\Http\Controllers;

use App\Models\Comentari;
use App\Models\Configuracio;
use App\Models\Configuracio_Servei;
use App\Models\Reserva;
use App\Models\Servei;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasaController extends Controller{


    public function datosFichaCasa(){

        $comentarios = Comentari::where('propietat_id',1)->get();
        $servicios = Configuracio_Servei::where('configuracio_id',1)->get();


        return view('fichaCasa',compact('comentarios','servicios'));
    }
    public function confirmacion(Request $request){

        $datosReserva = $request->all();
        return view('confirmacionReserva',compact('datosReserva'));
    }

    public function newReserva(Request $request){

        $reserva = new Reserva();

        $total = str_replace('€', '', $request -> input('total'));

        $reserva->preu_total = $total;
        $reserva->estat = 'PAGADA';
        $reserva->usuari_id = Auth::user()->id;
        $reserva->propietat_id = $request->session()->get('idPropiedad');
        $reserva->data_inici = $request -> input('frombd');
        $reserva->data_fi = $request -> input('tobd');

        $reserva -> save();

        $request->offsetUnset($request);

        $request->request->remove('frombd');
        $request->request->remove('from');
        $request->request->remove('to');
        $request->request->remove('tobd');

        return redirect() -> route('principal');

    }

}
