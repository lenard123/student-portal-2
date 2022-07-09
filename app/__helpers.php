<?php

use App\App;
use App\Request;

function app() : App
{
    return $GLOBALS['app'];
}

function request() : Request
{
    return app()->request;
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

function asset($file = null)
{
    return baseUrl() . '/assets/' . $file;
}