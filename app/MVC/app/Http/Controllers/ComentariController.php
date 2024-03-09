<?php

namespace App\Http\Controllers;

use App\Models\Comentari;
use App\Models\Tiquet_Comentari;
use App\Models\Traduccio;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentariController extends Controller{


    public function create(Request $request){

        $idPropiedad = $request->session()->get('idPropiedad');


        if($request->isMethod('post')){
            $tiquet = new Tiquet_Comentari();
            $tiquet->propietat_id = $idPropiedad;
            $tiquet->save();

            $tiquetNou = Tiquet_Comentari::latest('id')->first();

            $this->crearComentari($tiquetNou->id,'F',$request);

        }else{

            $this->crearComentari($request->tcId,'C',$request);
        }


        return redirect() -> back();
    }

    private function crearComentari($tiquet,$fa_contesta, $request){


        $comentario = new Comentari();
        $comentario->usuari_id = Auth::user()->id;
        $comentario->tc_id = $tiquet;
        $comentario->comentari = $request->descripcion;
        if($request -> input('rating') !== NULL){
            $comentario->puntuacio = $request->rating;
        }else{

        }
        $comentario->fa_contesta = $fa_contesta;
        $comentario->save();
    }

    public function allComent(Request $request) {

        $idUser = Auth::user()->id;

        $comentarios = User::findOrFail($idUser)
            ->comentarios()
            ->select('comentari.*', 'propietat.nom as nomPropietat')
            ->join('tiquet_comentari','comentari.tc_id','=','tiquet_comentari.id')
            ->join('propietat','tiquet_comentari.propietat_id','=','propietat.id')
            ->get();

        return $comentarios;
    }
    public function allCommentsForProperties(Request $request){

        $idUser = Auth::user()->id;
        $propiedades = User::find($idUser)->propiedad;
        $comentarios = [];

        foreach ($propiedades as $propiedad){
            $tiquet_comentari = Tiquet_Comentari::where('propietat_id',$propiedad->id)->get();
            foreach ($tiquet_comentari as $tiquet) {
                $comentariosQuery = Comentari::where('tc_id',$tiquet->id)->get();

                foreach ($comentariosQuery as $comentario) {

                    $comentarios[] = [
                        'nomPropietat' => $propiedad->nom,
                        'nomUser' => $comentario->user->nom,
                        'comentario' => $comentario
                    ];
                }
            }
        }

        return $comentarios;
    }

    public function delete(Request $request){

        $idU = Auth::user()->id;
        if(!$request->isMethod('post')){
            $idTc = $request->idProp;
            $estat = $request->estat;
            if($estat === 'F'){
                Comentari::where('tc_id',$idTc)->delete();
                Tiquet_Comentari::where('id',$idTc)->delete();
            }else{
                Comentari::where('tc_id',$idTc)->where('usuari_id',$idU)->delete();
            }
            return back();
        }else{
            $id = $request->input('idTc');
            $estat = $request->input('estat');
            if($estat === 'F'){

                Comentari::where('tc_id',$id)->delete();
                Tiquet_Comentari::where('id',$id)->delete();
            }else{
                Comentari::where('tc_id',$id)->where('usuari_id',$idU)->delete();
            }

            return redirect() -> route('principal',['id' => $request -> id]);
        }
    }
    public function comentarios(Request $request){

        $comentarios = $this -> allComent($request);

        foreach ($comentarios as $comentario) {
            $comentario -> nomPropietat = Traduccio::where('code', $comentario -> nomPropietat) -> where('lang', app() -> getLocale()) -> first() -> value;
        }

        return view('comentarios', compact('comentarios'));
    }

    public function allComentarios(Request $request){

        $comentarios = $this -> allCommentsForProperties($request);

        foreach ($comentarios as $key => $comentario) {
            $nomTraduit = Traduccio::where('code', $comentario['nomPropietat']) -> where('lang', app() -> getLocale()) -> first() -> value;
            $comentarios[$key]['nomPropietat'] = $nomTraduit;
        }
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('historialComentarios', compact('comentarios','user'));
    }
}
