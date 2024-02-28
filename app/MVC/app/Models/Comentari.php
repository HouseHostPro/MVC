<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comentari extends Model{
    use HasFactory;

    protected $table = 'comentari';
    //protected $primaryKey = ['propietat_id', 'usuari_id'];
    public $timestamps = false;
    protected $fillable = [

    ];
    public function user():BelongsTo{
        return $this->belongsTo(User::class,'usuari_id','id');
    }
    public function tiquetComentari(){
        return $this->belongsTo(Propietat::class,'tc_id','id');
    }
}
