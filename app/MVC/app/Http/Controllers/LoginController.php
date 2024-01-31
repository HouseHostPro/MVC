<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class LoginController extends Controller{


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
        $request->session()->put('username',$user->nom);

        if($user){
            if ($password === $user->contrasenya) {
                return redirect('/');
            } else {
                return back();
            }
        }


    }



}
