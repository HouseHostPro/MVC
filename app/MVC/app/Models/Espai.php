<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espai extends Model{
    use HasFactory;

    protected $table = 'espai';
    public $timestamps = false;
    protected $fillable = [
    ];
    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
    public function imagenes(){
        return $this->belongsTo(Imatge_Dormitori::class,'imatge_id','id');
    }
    public function espacios_defecto(){
        return $this->belongsTo(Espai_Defecte::class,'espaid_id','id');
    }
}
