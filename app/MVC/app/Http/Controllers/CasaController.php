<?php

namespace App\Http\Controllers;

use App\Models\Comentari;
use App\Models\Configuracio;
use App\Models\Configuracio_Servei;
use App\Models\Reserva;
use App\Models\Servei;
use App\Models\Tiquet_Comentari;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CasaController extends Controller{


    public function datosFichaCasa(){

        $tiquet_comentari = Tiquet_Comentari::where('propietat_id',1)->get();

        $comentarios = [];

        foreach ($tiquet_comentari as $tiquet) {
            $comentariosQuery = Comentari::where('tc_id',$tiquet->id)
                ->orderBy('tc_id','asc')
                ->orderByRaw("CASE WHEN fa_contesta = 'F' THEN 0 ELSE 1 END")
                ->get();
            foreach ($comentariosQuery as $comentario) {
                array_push($comentarios,$comentario);
            }
        }

        $servicios = Configuracio_Servei::where('configuracio_id',1)->get();

        return view('fichaCasa',compact('comentarios','servicios'));
    }
    public function confirmacion(Request $request){

        $datosReserva = $request->all();
        return view('confirmacionReserva',compact('datosReserva'));
    }

    public function confirmacionGet(Request $request){

        $comentarios = Comentari::where('propietat_id',1)->get();
        $servicios = Configuracio_Servei::where('configuracio_id',1)->get();


        return view('principal',compact('comentarios','servicios'));
    }

    public function newReserva(Request $request){

        $reserva = new Reserva();

        $total = str_replace('€', '', $request -> input('total'));

        $reserva->preu_total = $total;
        $reserva->estat = 'PAGADA';
        $reserva->persones = $request->input('personas');
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

    public function reservas(){

        return view('reservas');

    }
    public function historialReservas(){

        return view('historialReservas');

    }
    public function allReservasAjax(){


        $reservas = Reserva::select('reserva.*','propietat.nom as nomPropietat')
        ->where('reserva.usuari_id',Auth::user()->id)
        ->join('propietat', 'reserva.propietat_id', '=', 'propietat.id')
        ->get();

        return $reservas;
    }
    public function allReservasPropertiesAjax(){

        $reservas = Reserva::select('reserva.*', 'propietat.nom as nomPropietat')
            ->join('propietat', 'reserva.propietat_id', '=', 'propietat.id')
            ->where('propietat.usuari_id', Auth::user()->id)
            ->get();

        return $reservas;
    }



    public function sinAcceso(){

        return view('forbidden');
    }

}
