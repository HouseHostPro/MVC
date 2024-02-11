<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    public function ciutat()
    {
        return $this->hasMany(Ciutat::class,'pais_id','id');
    }
}
