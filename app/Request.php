<?php

namespace App;

use Carbon\Carbon;

class Request
{

    const GET = 'GET';
    const POST = 'POST';
    const PUT = 'PUT';
    const DELETE = 'DELETE';

    public function get(string $key = null, $default = null)
    {
        if (is_null($key))
            return $_GET;

        if (array_key_exists($key, $_GET))
            return $_GET[$key];

        return $default;
    }

    public function all()
    {
        return $this->get() + $this->post();
    }

    public function date($key)
    {
        $date = $this->request($key);
        return Carbon::make($date);
    }

    public function file($key)
    {
        $files = $this->files($key);
        if (count($files) > 0)
            return $files[0];
        return null;
    }

    public function files($key)
    {
        if (is_array($_FILES) && is_array($_FILES[$key]))
            return $_FILES[$key];
        return [];
    }

    public function post(string $key = null, $default = null)
    {
        if (is_null($key))
            return $_POST;

        if (array_key_exists($key, $_POST))
            return $_POST[$key];

        return $default;
    }

    public function request(string $key)
    {
        return $this->post(
            $key,
            $this->get($key)
        );
    }

    public function only(...$keys)
    {
        $result = array();
        foreach ($keys as $key) {
            $result[$key] = $this->request($key);
        }
        return $result;
    }

    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function receivedJSON() : bool
    {
        if (array_key_exists("CONTENT_TYPE", $_SERVER))
            return $_SERVER["CONTENT_TYPE"] === "application/json";

        return false;
    }

    public function expectsJSON() : bool
    {
        return str_contains($_SERVER["HTTP_ACCEPT"], "application/json");
    }

    public function boot()
    {
        if ($this->receivedJSON()) {
            $request_body = json_decode(file_get_contents("php://input"), TRUE) ?? [];
            $_POST = $_POST + $request_body;
        }

        if (is_array($_FILES)) {
            foreach($_FILES as $name => $file) {
                $tmp = array();
                $n = count($file["name"]);
                for($i = 0; $i < $n; $i++)
                {
                    $tmp[$i] = array();
                    foreach ($file as $key => $value) {
                        $tmp[$i][$key] = $value[$i];                        
                    }
                } 
                $_FILES[$name] = $tmp;
            }
        }
    }

    public function __get($name)
    {
        return $this->request($name);
    }
}
