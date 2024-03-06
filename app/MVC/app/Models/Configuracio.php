<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Configuracio extends Model{
    use HasFactory;

    protected $table = 'configuracio';
    public $timestamps = false;
    protected $fillable = [
    ];
    public function propiedad(){
        return $this->belongsTo(Propietat::class,'propietat_id','id');
    }
}
