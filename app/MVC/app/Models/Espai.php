<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Espai extends Model{
    use HasFactory;

    protected $table = 'espai';
    public $timestamps = false;
    protected $fillable = [
    ];

}
