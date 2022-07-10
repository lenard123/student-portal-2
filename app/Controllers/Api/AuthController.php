<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;

class AuthController extends BaseController
{
    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credential = request()->only('email', 'password');

        return auth()->login($credential);
    }

    public function logout()
    {
        auth()->logout();
    }

    public function currentUser()
    {
        return auth()->user();
    }
}
