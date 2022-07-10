<?php

namespace App\Exceptions;

use Rakit\Validation\ErrorBag;

class ValidationException extends ResponseException
{
    protected $status = 422;

    public $message = 'Please enter a valid data';

    public function __construct(ErrorBag $errorBag)
    {
        $this->errors = $this->formatErrors($errorBag->toArray());
    }

    private function formatErrors(array $errors) : array
    {
        $result = array();
        foreach($errors as $key => $error) {
            $result[$key] = array_values($error);
        }
        return $result;
    }

    public static function throw(string $key, ...$message)
    {
        $errorBag = new ErrorBag([$key => $message]);
        throw new ValidationException($errorBag);
    }
}