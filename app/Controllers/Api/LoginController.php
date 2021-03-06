<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class LoginController extends BaseController
{
    public function __invoke()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = request()->only('email', 'password');

        // dd($credential);

        return auth()->login($credential);
    }
}
