<?php

namespace App;

use Illuminate\Database\Capsule\Manager as Capsule;

class Database extends Capsule
{

    public function boot()
    {
        $this->addConnection([
            'driver' => 'mysql',
            'host' => config('DB_HOSTNAME'),
            'database' => config('DB_DATABASE'),
            'username' => config('DB_USERNAME'),
            'password' => config('DB_PASSWORD'),
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => '',
        ]);

        $this->bootEloquent();
    }
}