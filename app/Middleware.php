<?php

namespace App;

class Middleware
{
    public static $middlewares = [
        'auth' => Middlewares\Authenticate::class,
        'model' => Middlewares\BindModel::class,
    ];

    public static function handle($middlewares)
    {
        foreach ($middlewares as $conf)
        {
            $middleware = new static::$middlewares[$conf[0]];
            $params = $conf[1];
            $middleware->handle(...$params);
        }
    }
}
