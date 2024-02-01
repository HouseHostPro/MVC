<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "usuari";
    protected $fillable = [

    ];
    protected $hidden = [
        'remember_token',
        'id'
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
