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
    public $prefix = '';

    public static function view($path, $page): static
    {
        $static = new static();
        $static->path = $path;
        $static->type = static::TYPE_VIEW;
        $static->method = Request::GET;
        $static->page = $page;
        return $static;
    }

    public static function action($method, $path, $action) : static
    {
        $static = new static();
        $static->path = $path;
        $static->type = static::TYPE_CALLABLE;
        $static->method = $method;
        $static->action = $action;
        return $static;        
    }

    public static function post($path, $action): static
    {
        return static::action(Request::POST, $path, $action);
    }

    public static function patch($path, $action): static
    {
        return static::action(Request::PATCH, $path, $action);
    }

    public static function put($path, $action): static
    {
        return static::action(Request::PUT, $path, $action);
    }

    public static function get($path, $action): static
    {
        return static::action(Request::GET, $path, $action);
    }

    public static function delete($path, $action): static
    {
        return static::action(Request::DELETE, $path, $action);
    }


    public function match(): bool
    {
        $currentPath = trim(request()->get('page', ''), "/");
        $requestMethod = request()->method();
        $routePath = $this->getRoutePath();

        if ($currentPath !== $routePath)
            return false;

        if ($requestMethod !== $this->method)
            return false;

        return true;
    }

    public function getRoutePath()
    {
        $prefix = trim($this->prefix, "/");
        $path = trim($this->path, "/");

        return trim($prefix ."/". $path, "/");
    }

    public function middleware(...$middlewares)
    {
        foreach ($middlewares as $middleware) {
            $params = explode(":", $middleware);
            $middleware = array_shift($params);

            array_push($this->middlewares, [$middleware, $params]);
        }
        return $this;
    }

    public function response(): Response
    {
        Middleware::handle($this->middlewares);

        switch ($this->type) {
            case static::TYPE_VIEW:
                $template = view()->page($this->page);
                return Response::view($template);

            case static::TYPE_CALLABLE:
                return Response::call($this->action);
        }
    }
}
