<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    protected $table = "ciutat";
    protected $connection = "mysql";

    use HasFactory;

    protected $fillable = [

    ];

    protected $hidden = [
        'pais_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
}
