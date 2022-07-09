<?php

namespace App;

use Spatie\Ignition\Ignition;

class App 
{

    public array $configurations;
    public Request $request;
    public Router $router;
    public View $view;
    public Database $database;

    public function boot()
    {
        date_default_timezone_set('Asia/Manila');

        $this->configurations = include(ROOT_DIR . '/config.php');

        $this->database->boot();
    }

    public static function make($routes) : App
    {       
        Ignition::make()->register();

        $app = new self;
        $app->router = new Router($routes); 
        $app->view = new View();
        $app->database = new Database();
        $app->request = new Request();
        return $app;
    }

    public function render()
    {
        $this->router->handle();
    }
}
