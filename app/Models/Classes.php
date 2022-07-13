<?php

namespace App\Models;

class Classes extends Model
{
    protected $table = 'classes';

    protected $fillable = ['name', 'grade', 'section'];

    private static $covers = [
        ('img/cover/1.jpg'),
        ('img/cover/2.jpg'),
        ('img/cover/3.jpg'),
        ('img/cover/4.jpg'),
        ('img/cover/5.jpg'),
        ('img/cover/6.jpg'),
    ];

    public function getCoverAttribute()
    {
        return asset($this->attributes['cover']);
    }

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'class_id')->latest();
    }

    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    public static function generateCode()
    {
        return strtoupper(generateRandomString(4) . '-' . generateRandomString(4));
    }

    public static function generateCover()
    {
        $covers = static::$covers;        
        $i = rand(0, count($covers) - 1);
        return $covers[$i];
    }
}