<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plantilla extends Model
{
    use HasFactory;

    protected $table = 'plantilla';
    public $timestamps = false;
    protected $fillable = [];

    public function propiedad(){
        return $this->hasMany(Propietat::class,'plantilla_id','id');
    }
}
