<?php

namespace App\Http\Controllers;


use App\Models\Ciutat;
use App\Models\Comentari;
use App\Models\Configuracio_Servei;
use App\Models\Pais;
use App\Models\Tiquet_Comentari;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller{

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

        User::hashPassword();
        var_dump($request);

        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $user->update($request->all());
        }else{
            User::create($request->all());
        }
        return view('fichaCasa');
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

        /* || !Hash::check($password,$user->contrasenya)*/
        if ($user != null) {

            if($password == $user->contrasenya){
                Auth::login($user);
                $request->session()->put('idPropiedad',$idPropiedad);
                $request->session()->put('user',$user);

                return redirect()->route($request->session()->has('ruta') ? $request->session()->get('ruta'): 'principal');
            }
            return redirect()->route('login');
        }else{
            return redirect()->route('login');
        }
    }
    public function logout(Request $request){

        $request->session()->invalidate();
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
        Auth::logout();

        return redirect()->route('principal',compact('comentarios','servicios'));
    }
    public function cuenta(Request $request){

        $user = $request->session()->get('user');

        return view('cuenta',compact('user'));
    }
}
