<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Exceptions\ValidationException;
use App\Models\User;

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
        return redirect('login');
    }

    public function currentUser()
    {
        return auth()->user();
    }

    public function register()
    {
        $this->validate([
            'role' => 'required',
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email',
            'gender' => 'required',
            'birthday' => 'required',
            'password' => 'required|min:8',
            'password_confirmation' => 'required|same:password'
        ]);

        if (User::where('email', request()->email)->exists()) {
            ValidationException::throw('email', 'Email already exists');
        }

        $user = User::create(request()->all());

        return $user;
    }
}
