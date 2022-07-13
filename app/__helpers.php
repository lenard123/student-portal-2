<?php

use App\App;
use App\Auth;
use App\Request;
use App\Session;
use App\View;

function app() : App
{
    return $GLOBALS['app'];
}

function request() : Request
{
    return app()->request;
}

function auth() : Auth
{
    return app()->auth;
}

function session() : Session
{
    return app()->session;
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

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}