<?php

namespace App\Http\Controllers;

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
        return view('layouts.register');
    }
    public function allUsers(){

        $users = User::all();
        var_dump($users);
    }

    public function store(Request $request) {
        User::create($request->all());
//        return redirect()     TODO: redirect to login
    }

    public function checkLogin(Request $request){

        /*$credentials = $request->only('username', 'password');
        if (Auth::attempt($credentials)) {

            return redirect()->view('/principal');
        } else {
            return back()->withInput()->withErrors(['message' => 'Credenciales incorrectas']);
        }*/
        $email = $request->email;
        $password = $request->password;

        $user = User::where('email',$email)->first();

        if($user){
            if ($password === $user->contrasenya) {
                $request->session()->put('username',$user->nom);
                return redirect('/');
            } else {
                return back();
            }
        }else{
            return back();
        }
    }
}
