<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imatge_Dormitori extends Model{

    protected $table = 'imatges_dormitoris';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function espacios(){
        return $this->hasMany(Espai::class,'imatge_id','id');
    }
}
