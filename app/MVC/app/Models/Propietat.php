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
    public function tiquetComentario(){
        return $this->hasMany(Propietat::class,'propietat_id','id');
    }
}
