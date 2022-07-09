<?php

namespace App;

class Request
{

    const GET = 'GET';
    const POST = 'POST';

    public function get(string $key, $default = null)
    {
        if (array_key_exists($key, $_GET))
            return $_GET[$key];

        return $default;
    }

    public function post(string $key, $default = null)
    {
        if (array_key_exists($key, $_POST))
            return $_POST[$key];

        return $default;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
}
