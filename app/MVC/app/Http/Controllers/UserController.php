<?php

namespace App\Http\Controllers;

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
        return view('layouts.register');
    }

    public function store(Request $request) {
        User::create($request->all());
//        return redirect()     TODO: redirect to login
    }
}
