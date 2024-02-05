<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
