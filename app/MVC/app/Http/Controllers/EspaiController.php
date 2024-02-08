<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Espai;

class EspaiController extends Controller {
    public function findAllByPropietat($propietatId) {
        return DB::table('espai') -> where('propietat_id', '=' , $propietatId) -> get();
    }

    public function loadForm($propietatId) {
        $espais = $this -> findAllByPropietat($propietatId);
        //$tipus = $this-> findAllTipus();
        return redirect() -> route('espai.form', [$espais/*, $tipus*/]);
    }

    public function create() {
        $espai = new Espai();
        //$espai ->
    }

    private function findAllTipus() {
        return DB::query("SELECT table_name FROM information_schema.columns WHERE column_name like 'espai_id';");
    }
}
