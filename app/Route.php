<?php

namespace App;

class Route
{

    const TYPE_VIEW = 'view';

    public string $path;
    public string $type;
    public string $method;
    public string $page;
    public array $middlewares = [];

    public static function view($path, $page) : Route
    {
        $route = new Route();
        $route->path = $path;
        $route->type = static::TYPE_VIEW;
        $route->method = Request::GET;
        $route->page = $page;
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
        if ($this->type === static::TYPE_VIEW) {
            return Response::view($this->page);
        }
    }
}
