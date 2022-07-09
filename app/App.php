<?php

namespace App;

use Spatie\Ignition\Ignition;

class App 
{

    public Request $request;
    public Router $router;

    public static function make($routes) : App
    {
        Ignition::make()->register();
        
        $app = new self;
        $app->router = new Router($routes); 
        $app->request = Request::make();
        return $app;
    }

    public function render()
    {
        $this->router->handle();
    }
}
