<?php

namespace App\Models;

class User extends Model
{
    protected $fillable = [
        'role', 
        'firstname', 
        'lastname', 
        'middlename',
        'email',
        'password',
        'birthday',
        'gender'
    ];

    public function setPasswordAttribute($password) : void
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }
}