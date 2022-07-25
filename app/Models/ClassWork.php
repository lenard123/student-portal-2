<?php

namespace App\Models;

class ClassWork extends Model
{
    public function class()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function submitted()
    {
        return $this->hasMany(SubmittedClassWork::class, 'class_work_id');
    }

    public function getIsSubmittedAttribute()
    {
        return false;
    }
}