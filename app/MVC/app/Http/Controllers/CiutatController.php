<?php

namespace App\Http\Controllers;

use App\Models\Ciutat;
use Illuminate\Http\Request;

class CiutatController extends Controller
{
    public function ciutats()
    {
        $ciutats = Ciutat::all();
        return $ciutats;
    }
}
