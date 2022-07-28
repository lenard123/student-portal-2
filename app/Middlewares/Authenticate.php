<?php

namespace App\Middlewares;

use App\Exceptions\UnauthenticatedException;

class Authenticate
{
    public function handle($role = null)
    {
        auth()->authenticate($role);
    }
}