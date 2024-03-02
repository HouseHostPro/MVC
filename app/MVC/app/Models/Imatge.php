<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imatge extends Model{
    use HasFactory;

    protected $table = 'imatge';
    public $timestamps = false;
    protected $fillable = [
    ];

    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
}
