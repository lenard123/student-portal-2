<?php

namespace App;

class Route
{

    const TYPE_VIEW = 'view';
    const TYPE_CALLABLE = 'callable';

    public string $path;
    public string $type;
    public string $method;
    public string $page;
    public array $middlewares = [];
    public $action;

    public static function view($path, $page) : Route
    {
        $route = new Route();
        $route->path = $path;
        $route->type = static::TYPE_VIEW;
        $route->method = Request::GET;
        $route->page = $page;
        return $route;
    }


    public static function post($path, $action) : Route
    {
        $route = new Route();
        $route->path = $path;
        $route->type = static::TYPE_CALLABLE;
        $route->method = Request::POST;
        $route->action = $action;
        return $route;
    }


    public function match() : bool
    {
        $currentPath = request()->get('page', '');
        $requestMethod = request()->method();

        if ($currentPath !== $this->path) 
            return false;

        if ($requestMethod !== $this->method) 
            return false;

        return true;
    }

    public function response() : Response
    {
        switch ($this->type)
        {
            case static::TYPE_VIEW:
                return Response::view($this->page);
            
            case static::TYPE_CALLABLE:
                return Response::call($this->action);
        }
    }    
}
