<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected static self $current;

    public static function current() : self
    {
        return self::$current;
    }

    public function setAsCurrent()
    {
        self::$current = $this;
    }
}