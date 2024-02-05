<?php

namespace App\Http\Controllers;

use App\Models\Propietat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class PropietatController extends Controller {
    public function findAll() {
        $propietats = Propietat::all();
        //return redirect()->route('property.index', compact('propietats'));
    }

    public function findAllByUser() {
        $propietats = DB::table('propietat') -> where('usuari_id', '=' , 1) -> get();
        //$propietats = DB::select('select * from propietat where usuari_id = 1') ->;
        //$propietats = Propietat::select()
        //return redirect('property.view', $propietats);
        //return Redirect::route('/propertyView', ['propietats' => $propietats]);


        return view("property/property", compact("propietats"));
    }

    /*public function index($propietats) {
        return view('property/property.blade', compact($propietats));
    }*/

    public function store(Request $request) {
        $property = new Propietat();
        $property -> nom = $request -> nombre;
        $property -> localitzacio = $request -> ubicacion;
        $property -> m2 = $request -> m2;

    }
}
