<?php

namespace App\Http\Controllers;

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

        if ($email === 'admin@admin.com' && $password === '1234') {

            return redirect('/');
        } else {
            return back();
        }

    }



}
