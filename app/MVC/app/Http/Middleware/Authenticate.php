<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */


    protected function redirectTo($request)
    {

        $id = explode("/", url() -> current())[4];

        if (!Auth::check()) {
            $request->session()->put('ruta',$request->path());
            return route('login', ['id' => $id]);
        }
    }
}
