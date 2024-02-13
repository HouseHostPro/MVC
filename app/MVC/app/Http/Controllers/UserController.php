<?php

namespace App\Http\Controllers;


use App\Models\Ciutat;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
        if(Auth::check()){

            $email = Auth::user()->email;
            $user = User::where('email', $email)->first();

            return view('register',compact('ciutats','paises','user'));
        }else{

            return view('register',compact('ciutats','paises'));
        }
    }
    public function allUsers(){

        $users = User::all();
        var_dump($users);
    }

    public function store(Request $request) {

        $request->validate([
            'nom' => 'required|string',
            'email' => 'required|string',
            'contrasenya' => 'required|string|min:8',
        ]);

        User::hashPassword();

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

    public function checkLogin(Request $request){


        $email = $request->email;
        $password = $request->password;
        $idPropiedad = 1;

        $user = User::where('email', $email)->first();

        if ($email == $user->email /* || !Hash::check($password,$user->contrasenya)*/) {

            if($password == $user->contrasenya){
                Auth::login($user);
                $request->session()->put('idPropiedad',$idPropiedad);

                return redirect()->route($request->session()->has('ruta') ? $request->session()->get('ruta'): 'principal');
            }
            return redirect()->route('login');
        }else{
            return redirect()->route('login');
        }
    }
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();

        return redirect()->route('principal');

    }
    public function cuenta(){

        return view('cuenta');
    }
}
