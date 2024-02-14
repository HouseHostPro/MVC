<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserva extends Model{

    use HasFactory;
    protected $table = 'reserva';
    public $timestamps = false;

    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }public function uuarios(){
        return $this->belongsTo(User::class,'usuari_id','id');
    }

}
