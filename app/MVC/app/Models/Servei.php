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

    public function prop_serv(){
        return $this->hasMany(Propietat_Servei::class,'servei_id','id');
    }

}
