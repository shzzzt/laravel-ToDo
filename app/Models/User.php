<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable //authenticatable class is extended to provide authentication features
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [ //fillable attributes that
        'name',
        'email',
        'password',
        'profile_image',
    ];

    /**
     * The attributes that should be hidden for serialization.
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
 
    //attributes casting
    protected function casts(): array //casts() is a method that defines how attributes should be cast to native types
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ]; //return an array of attributes and their corresponding cast types
    }
}
