<?php

namespace App\Controllers;

use App\Exceptions\ValidationException;
use Rakit\Validation\Validator;

class BaseController
{
    public function validate($rules = [])
    {
        $validator = new Validator();

        $validation = $validator->make(request()->all(), $rules);
        $validation->validate();

        if ($validation->fails()) 
            throw new ValidationException($validation->errors());

    }
}