<?php

namespace App\Http\Controllers;

use App\Models\Imatge;
use App\Models\Propietat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagenesController extends Controller{

    private function idPropiedad($request){

        $url = $request->url();
        //Expresión regular para coger el número de la propiedad que se esá editando
        if (preg_match('/property\/(\d+)\/galeria/', $url, $matches)) {
            return $matches[1];
        }
    }
    private function allUrlsImage(){

        $allUrls = [];
        $imagenes = Imatge::all();

        foreach ($imagenes as $imagen){

            $url = Storage::disk('propiedades')->url($imagen->url);
            $allUrls[] = [
                'url' => $url,
                'id' => $imagen->id,
            ];
        }
        return $allUrls;
    }
    public function allImages(Request $request){

        $idProp = $this->idPropiedad($request);

        $allUrls = $this->allUrlsImage();


        $propietat = Propietat::find($idProp);

        return view('property/propertyGaleria',compact('allUrls', 'propietat'));

    }
    public function store(Request $request){

        $idProp = $this->idPropiedad($request);
        $carpeta = 'propiedad' . $idProp;

        foreach ($request->imagen as $img) {

            //La ruta de la imagen en el bucket
            $imgHash = Storage::get($img);
            $ruta = Storage::disk('propiedades')->put($carpeta,$img,$imgHash);

            $imagen = new Imatge();

            $imagen->propietat_id = $idProp;
            $imagen->nom = $img;
            $imagen->url = $ruta;

            $imagen->save();
        }

        $allUrls = $this->allUrlsImage();

        $propietat = Propietat::find($idProp);

        return view('property/propertyGaleria',compact('allUrls','propietat'));
    }

    public function delete(Request $request){

        $idProp = $this->idPropiedad($request);

        $id = $request->id;
        $imagen = Imatge::find($id);

        Storage::disk('propiedades')->delete($imagen->url);
        $imagen->delete();

        return redirect() ->route('property.gallery',['id' => $request -> idProp, 'prop_id' => $idProp]);

    }

}
