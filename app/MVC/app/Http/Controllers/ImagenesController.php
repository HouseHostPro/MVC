<?php

namespace App\Http\Controllers;

use App\Models\Imatge;
use App\Models\Propietat;
use App\Models\Traduccio;
use Carbon\Carbon;
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
    private function allUrlsImage($id){

        $allUrls = [];
        $imagenes = Imatge::where('propietat_id', $id)->get();

        foreach ($imagenes as $imagen){
            $url = Storage::disk('propiedades')->temporaryUrl(
                $imagen->url,
                Carbon::now()->addSeconds(30)
            );
            $allUrls[] = [
                'url' => $url,
                'id' => $imagen->id,
                'idProp' => $imagen->propietat_id
            ];
        }
        return $allUrls;
    }
    public function allImages(Request $request){

        $idProp = $this->idPropiedad($request);

        $allUrls = $this->allUrlsImage($idProp);

        $propietat = Propietat::find($idProp);
        $propietat -> nom = Traduccio::where('code', $propietat -> nom) -> where('lang', app() -> getLocale()) -> first() -> value;


        return view('property/propertyGaleria',compact('allUrls', 'propietat'));

    }
    public function allImagesAjax(Request $request){

        $id = $request->id;

        $allUrls = $this->allUrlsImage($id);

        return $allUrls;
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
            $imagen->portada = 0;
            $imagen->nom = $img;
            $imagen->url = $ruta;

            $imagen->save();
        }

        $allUrls = $this->allUrlsImage($idProp);

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
    public function imagenesPrincipalesAjax(Request $request){
        $imagenes = Imatge::where('portada', 1)->get();

        $allUrls = [];

        foreach ($imagenes as $imagen){
            $url = Storage::disk('propiedades')->temporaryUrl(
                $imagen->url,
                Carbon::now()->addSeconds(30)
            );
            $allUrls[] = [
                'url' => $url,
                'id' => $imagen->id,
                'idProp' => $imagen->propietat_id
            ];
        }
        return $allUrls;
    }

    public function imagenPrincipal(Request $request){

        $idProp = $request->prop_id;
        $id = $request->id;

        $imagen = Imatge::where('propietat_id', $idProp)
                ->where('portada', 1)
                ->first();

        if ($imagen) {
            $imagen->portada = 0;
            $imagen->save();
            $img = Imatge::find($id);
            $img->portada = 1;
            $img->save();
        } else {
            $img = Imatge::find($id);
            $img->portada = 1;
            $img->save();

        }
        return redirect() ->route('property.gallery',['id' => $request -> idProp, 'prop_id' => $idProp]);
    }

}
