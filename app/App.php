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
    public Session $session;
    public Auth $auth;

    public function boot()
    {
        Ignition::make()->register();

        date_default_timezone_set('Asia/Manila');

        $this->configurations = include(ROOT_DIR . '/config.php');

        $this->database->boot();

        $this->session->boot();

        $this->request->boot();
    }

    public static function make($routes) : App
    {
        $app = new self;
        $app->router = new Router($routes); 
        $app->view = new View();
        $app->database = new Database();
        $app->request = new Request();
        $app->session = new Session();
        $app->auth = new Auth();

        return $app;
    }

    public function render()
    {
        $this->router->handle();
        exit();
    }
}
