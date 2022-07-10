<?php

namespace App\Exceptions;

use App\Response;

class ResponseException extends \Exception
{
    protected $status = 500;

    public $message = "An unknown error occured";

    public $errors = null;

    public function getStatus()
    {
        return $this->status;
    }

    public function handler() : Response
    {
        return Response::make($this);
    }
}