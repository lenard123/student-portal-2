<?php

use App\App;
use App\Request;
use App\View;

function app() : App
{
    return $GLOBALS['app'];
}

function request() : Request
{
    return app()->request;
}

function view() : View
{
    return app()->view;
}

function pages_path($file)
{
    return ROOT_DIR . '/pages/'.$file;
}

function baseUrl()
{
    if (defined('BASE_URL'))
        return BASE_URL;
}

function url($path = null)
{
    return baseUrl() . '/' . $path;
}

function route($path)
{
    return url('?page=' . $path);
}

function asset($file = null)
{
    return baseUrl() . '/assets/' . $file;
}

function config($key, $default = null)
{
    $config = app()->configurations;
    if (array_key_exists($key, $config)) {
        return $config[$key];
    }
    return $default;
}