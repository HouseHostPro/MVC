<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    use HasFactory;

    protected $fillable = [

    ];

    protected $hidden = [
        'pais_id'
    ];

    protected $table = "ciutat";
}
