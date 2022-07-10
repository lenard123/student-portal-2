<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function __invoke()
    {
        return new LoginController;
    }
}
