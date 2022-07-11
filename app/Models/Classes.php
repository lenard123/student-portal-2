<?php

namespace App\Models;

class Classes extends Model
{
    protected $table = 'classes';

    public function getCoverAttribute()
    {
        return asset($this->attributes['cover']);
    }
}