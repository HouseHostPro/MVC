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
        if(!$request->isMethod('post')){
            $idP = $request->id;
            Comentari::where('propietat_id',$idP)->where('usuari_id',$idU)->delete();

            return redirect() -> route('comentarios');
        }else{
            $idP = $request->session()->get('idPropiedad');
            Comentari::where('propietat_id',$idP)->where('usuari_id',$idU)->delete();

            return redirect() -> route('principal');
        }
    }

    public function allComentarios(Request $request){

        $id = Auth::user()->id;

        $comentarios = Comentari::where('usuari_id',$id)->get();

        return view('comentarios',compact('comentarios'));

    }

    public function allCommentsForProperties(Request $request){

        $id = $request->session()->get('idPropiedad');
        $comentarios = Comentari::select('comentari.*', 'propietat.nom as nomPropietat')
            ->where('propietat.id', $id)
            ->join('propietat', 'comentari.propietat_id', '=', 'propietat.id')
            ->get();

        return $comentarios;

    }

    public function allComent() {

        $comentarios = Comentari::select('comentari.*', 'propietat.nom as nomPropietat')
            ->where('comentari.usuari_id', Auth::user()->id)
            ->join('propietat', 'comentari.propietat_id', '=', 'propietat.id')
            ->get();

        return $comentarios;
    }

}
