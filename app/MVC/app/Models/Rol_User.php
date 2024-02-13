<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol_User extends Model{
    use HasFactory;

    protected $table = 'rol_has_usuari';

    public $timestamps = false;
    protected $fillable = [

    ];

    public function Ruser(){
        return $this->belongsTo(User::class,'usuari_id','id');
    }
    public function Rrol(){
        return $this->belongsTo(Rol::class,'rol_id','id');
    }
}
