<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ciutat extends Model
{
    protected $table = "ciutat";

    use HasFactory;

    protected $fillable = [

    ];

    protected $hidden = [
        'pais_id'
    ];

    public function users()
    {
        return $this->hasMany(User::class,'ciutat_id','id');
    }
    public function pais()
    {
        return $this->belongsTo(Pais::class,'pais_id','id');
    }
}
