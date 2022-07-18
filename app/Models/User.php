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

    protected $appends = ['fullname'];

    protected $hidden = [
        'password'
    ];

    public function setPasswordAttribute($password) : void
    {
        $this->attributes['password'] = password_hash($password, PASSWORD_DEFAULT);
    }

    public function classes()
    {
        return $this->hasMany(Classes::class, 'teacher_id');
    }

    public function getAvatarAttribute()
    {
        $seed = urlencode($this->firstname);
        return "https://avatars.dicebear.com/api/initials/{$seed}.svg";
    }

    public function getFullnameAttribute()
    {
        return $this->firstname." ".$this->lastname;
    }
}