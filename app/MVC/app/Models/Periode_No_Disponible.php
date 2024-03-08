<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Periode_No_Disponible extends Model{
    use HasFactory;
    protected $table = 'periodes_no_disponibles';
    public $timestamps = false;

    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
}
