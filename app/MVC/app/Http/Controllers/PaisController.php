<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

class PaisController extends Controller
{
    public function paises()
    {
        $paises = Pais::all();
        return $paises;
    }
}
