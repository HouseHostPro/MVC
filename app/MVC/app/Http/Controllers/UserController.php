<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use App\Models\Pais;
use App\Models\User;
use http\Client\Request;

class UserController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function register()
    {
        return view('register');
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
        return redirect()->route('login')->with('success','created successfully');
    }

    public function update(Request $request,$id)
    {
        $request->validated();
        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('login')->with('success','Usuario actualizado');

    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('login')->with('success','Usuario eliminado');
    }
}
