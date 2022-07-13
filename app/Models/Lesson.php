<?php

namespace App\Models;

class Lesson extends Model
{

    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

}