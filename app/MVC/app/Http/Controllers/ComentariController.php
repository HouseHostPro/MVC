<?php

namespace App\Http\Controllers;

use App\Models\Comentari;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariController extends Controller{


    public function create(Request $request){

        $comentario = new Comentari();

        $comentario->propietat_id = $request->session()->get('idPropiedad');
        $comentario->usuari_id = Auth::user()->id;
        $comentario->comentari = $request -> input('descripcion');
        $comentario->puntuacio = $request -> input('rating');

        $comentario->save();
        return redirect() -> route('principal');
    }

}
