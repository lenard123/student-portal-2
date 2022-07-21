<?php

namespace App\Models;

use Exception;
use Illuminate\Database\Eloquent\Model as BaseModel;

class Model extends BaseModel
{
    protected static $current = [];

    public static function current() : self
    {
        if (array_key_exists(static::class, static::$current))
            return static::$current[static::class];

        throw new Exception("No model binded in: " . static::class);
    }

    public function setAsCurrent()
    {
        static::$current[$this::class] = $this;
    }

    protected function castAttribute($key, $value)
    {
        if ($this->getCastType($key) == 'array' && is_null($value)) {
            return [];
        }

        return parent::castAttribute($key, $value);
    }
}