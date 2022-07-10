<?php

namespace App\Middlewares;

class Authenticate
{
    public function handle($role = null)
    {
        auth()->authenticate($role);
    }
}