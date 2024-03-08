<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propietat_Servei extends Model{
    use HasFactory;

    protected $table = 'propietat_has_servei';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function servicios(){
        return $this->belongsTo(Servei::class,'servei_id','id');
    }
    public function propietat(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
}
