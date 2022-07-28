<?php

namespace App\Exceptions;

use App\Response;

class UnauthenticatedException extends ResponseException
{
    protected $status = 401;

    public $message = "Unauthenticated";

    public function __construct(private $role)
    {        
    }

    public function handler(): Response
    {
        if (request()->expectsJSON())
            return parent::handler();

        if ($this->role === 'admin')
            return Response::redirect(route('admin/login'));
        
        return Response::redirect(route('login'));
    }
}