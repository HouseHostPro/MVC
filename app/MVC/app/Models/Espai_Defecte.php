<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espai_Defecte extends Model{
    protected $table = 'espais_defecte';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function espacios(){
        return $this->hasMany(Espai::class,'espaid_id','id');
    }
}
