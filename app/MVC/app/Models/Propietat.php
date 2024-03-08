<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Propietat extends Model {
    use HasFactory;

    protected $fillable = [
        'nom',
        'localitzacio',
        'm2',
        'ciutat_id',
        'usuari_id'
    ];

    public $timestamps = false;
    protected $table = "propietat";

    public function reservas(): HasMany {
        return $this->hasMany(Reserva::class,'propietat_id','id');
    }
    public function propietari(){
        return $this->belongsTo(User::class,'usuari_id','id');
    }
    //Si da un fallo los comentarios puede que sea por esta linea
    public function tiquetComentario(){
        return $this->hasMany(Tiquet_Comentari::class,'propietat_id','id');
    }
    public function imaganes(){
        return $this->hasMany(Imatge::class,'propietat_id','id');
    }
    public function config_servicios(){
        return $this->hasMany(Propietat_Servei::class,'propietat_id','id');
    }
    public function espacios(){
        return $this->hasMany(Espai::class,'propietat_id','id');
    }
    public function configuracion(){
        return $this->hasMany(Configuracio::class,'propietat_id','id');
    }
    public function periodosNoDisponibles(){
        return $this->hasMany(Periode_No_Disponible::class,'propietat_id','id');
    }

}
