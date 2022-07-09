<?php

namespace App;

class Router
{
    private $not_found_page = '404.php';

    // private $home_page = 'home.php';

    public function __construct(private $routes = [])
    {}

    public function handle()
    {
        $route = $this->findRoute();
        $route->response();
    }

    private function findRoute() : Route
    {
        foreach($this->routes as $route) {
            if ($route->match()) return $route;
        }

        dd('Page not found');
    }
}
