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
        if($request -> input('rating') !== NULL){
            $comentario->puntuacio = $request -> input('rating');
        }else{
            $comentario->puntuacio = 0;
        }

        $comentario->save();
        return redirect() -> route('principal');
    }

    public function delete(Request $request){

        $idU = Auth::user()->id;
        $idP = $request->session()->get('idPropiedad');

        Comentari::where('propietat_id',$idP)->where('usuari_id',$idU)->delete();

        return redirect() -> route('principal');
    }

    public function allComentarios(Request $request){

        $id = Auth::user()->id;

        $comentarios = Comentari::where('usuari_id',$id)->get();

        return view('comentarios',compact('comentarios'));

    }

}
