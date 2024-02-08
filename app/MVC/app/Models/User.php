<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    protected $table = "usuari";

    public $timestamps = false;

    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [

    ];
    protected $hidden = [
        'remember_token',
        'id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $guarded = ['id'];

    public function ciutatUser(){
        return $this->belongsTo(Ciutat::class);
    }

    public static function hashPassword()
    {
        static::creating(function ($user) {
            $user->contrasenya = Hash::make($user->contrasenya);
        });
    }

}
