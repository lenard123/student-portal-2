<?php

namespace App\Exceptions;

use App\Response;

class UnauthenticatedException extends ResponseException
{
    protected $status = 401;

    public $message = "Unauthenticated";

    public function handler(): Response
    {
        if (request()->expectsJSON())
            return parent::handler();
        
        return Response::redirect(route('login'));
    }
}