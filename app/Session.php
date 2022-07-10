<?php

namespace App;

class Session
{
    public function boot()
    {
        session_start();
        $this->session_data = $_SESSION;        
    }

    public function get($key, $default = null)
    {
        if ($this->has($key)) {
            return $_SESSION[$key];
        }

        return $default;
    }

    public function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public function has($key)
    {
        return array_key_exists($key, $_SESSION);
    }

    public function remove($key)
    {
        if ($this->has($key))
            unset($_SESSION[$key]);
    }

}