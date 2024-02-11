<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracio_Servei extends Model{
    use HasFactory;

    protected $table = 'configuracio_has_servei';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function Cservicios(){
        return $this->belongsTo(Servei::class,'servei_id','id');
    }
    public function Sconfiguracion(){
        return $this->belongsTo(Configuracio::class,'configuracio_id','id');
    }

}
