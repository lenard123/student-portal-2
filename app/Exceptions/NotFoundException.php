<?php

namespace App\Exceptions;

use App\Response;

class NotFoundException extends ResponseException
{
    protected $status = 404;

    public $message = "Page not found";

    public function handler(): Response
    {
        if (request()->expectsJSON())
            return parent::handler();
        
        dd('Page Not Found');
    }
}