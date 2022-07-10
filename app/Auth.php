<?php

namespace App;

use App\Exceptions\UnauthenticatedException;
use App\Exceptions\ValidationException;
use App\Models\User;

class Auth
{
    const SESSION_KEY = 'current_user';

    private ?User $user;

    public function login($credential)
    {
        $user = User::where('email', $credential['email'])->first();

        if (is_null($user)) {
            ValidationException::throw('email','We can\'t find a user that belongs to your email.');            
        }

        if (!password_verify($credential['password'], $user->password)) {
            ValidationException::throw('email', 'Wrong email or password.');
        }

        $this->user = $user;
        session()->set(static::SESSION_KEY, $user->id);

        return $user;
    }

    public function logout()
    {
        session()->remove(static::SESSION_KEY);
        $this->user = null;
    }

    public function authenticate($role = null)
    {
        if (!session()->has(static::SESSION_KEY))
            throw new UnauthenticatedException();

        $user = User::find(session()->get(static::SESSION_KEY));

        if (is_null($user))
            throw new UnauthenticatedException();

        if ($user->role !== $role)
            throw new UnauthenticatedException();

        $this->user = $user;
    }

    public function user()
    {
        return $this->user;
    }
}