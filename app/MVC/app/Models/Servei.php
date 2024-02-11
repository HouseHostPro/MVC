<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servei extends Model{
    use HasFactory;

    protected $table = 'servei';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function configuracion()
    {
        return $this->hasMany(Configuracio_Servei::class,'servei_id','id');
    }

}
