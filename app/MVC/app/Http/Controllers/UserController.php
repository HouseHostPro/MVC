<?php

namespace App\Http\Controllers;


use App\Models\Ciutat;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function register()
    {
        $paises = Pais::all();
        $ciutats = Ciutat::all();
        return view('register',compact('ciutats','paises'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'email'=>'required'
        ]);
        return redirect()->view('register');

    }

    public function store(Request $request) {

        User::create($request->all());
        return view('login');
    }

    public function userId($id)
    {
        $usuari = User::find($id);
        return view('edit',compact('usuari'));
    }
    public function update(Request $request,$id)
    {
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('user.userId',['id'=>$id]);

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->view('login')->with('success','Usuario eliminado');
    }
}
