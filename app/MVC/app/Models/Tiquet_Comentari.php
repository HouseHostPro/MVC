<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiquet_Comentari extends Model{
    protected $table = 'tiquet_comentari';
    public $timestamps = false;
    protected $fillable = [

    ];

    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
    public function comentarios(){
        return $this->hasMany(Comentari::class,'tc_id','id');
    }
}
