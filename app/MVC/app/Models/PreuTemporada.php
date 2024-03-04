<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreuTemporada extends Model
{
    use HasFactory;

    protected $table = "preu_temporada";
    public $timestamps = false;
}
