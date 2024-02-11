<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use MongoDB\Laravel\Eloquent\Model;

class Traduccio extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'traduccions';
}
