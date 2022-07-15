<?php

namespace App\Models;

class ClassWork extends Model
{
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }
}