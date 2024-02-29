<?php

namespace App\Http\Controllers;


use App\Models\Ciutat;
use App\Models\Comentari;
use App\Models\Configuracio_Servei;
use App\Models\Pais;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use RealRashid\SweetAlert\Facades\Alert;

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

        if(Auth::check()){
            $user = User::find(Auth::user()->id);
            $user->update($request->all());

            Alert::success(__('Actualizado'), __(''));

            return redirect() -> back() -> with('success', 'Actualizado');
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
        $idPropiedad = $request -> casaId;

        $user = User::where('email', $email)->first();

        if ($email == $user->email /* || !Hash::check($password,$user->contrasenya)*/) {
        if($password == $user -> contrasenya)
            /*if(Hash::check($password, $user -> contrasenya))*/{
                Auth::login($user);
                $request->session()->put('idPropiedad',$idPropiedad);
                $request->session()->put('user',$user);

                return redirect() -> route('principal', ['id' => $request -> casaId]);
                //return redirect()->route($request->session()->has('ruta') ? $request->session()->get('ruta'): 'principal');
            }
            return redirect()->route('login', ['id' => $request -> casaId]);
        }else{
            return redirect()->route('login', ['id' => $request -> casaId]);
        }
    }
    public function logout(Request $request){

        Auth::logout();
        $request->session()->invalidate();
        $comentarios = Comentari::where('propietat_id',1)->get();
        $servicios = Configuracio_Servei::where('configuracio_id',1)->get();

        return redirect()->route('principal', ['id' => $request -> id, 'comentarios' => $comentarios, 'servicios' => $servicios]);
    }
    public function cuenta(Request $request){

        $user = $request->session()->get('user');

        return view('cuenta',compact('user'));
    }
}
