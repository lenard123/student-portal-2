<?php

namespace App;

use App\Exceptions\NotFoundException;
use App\Exceptions\ResponseException;

class Router
{
    private $not_found_page = '404.php';

    public function __construct(private $routes = [])
    {
    }

    public function handle()
    {
        $response = null;
        try {
            $route = $this->findRoute();
            $response = $route->response();
        } catch (ResponseException $exception) {
            $response = $exception->handler();
        } catch (\Throwable $ex) {

            $response = Response::make([
                'message' => $ex->getMessage(),
                'stacktrace' => $ex->getTrace(),
                'file' => $ex->getFile(),
                'code' => $ex->getCode(),
                'line' => $ex->getLine(),
            ]);
            $response->status = 500;
        }
        $response->render();
    }

    private function findRoute(): Route
    {
        foreach ($this->routes as $route) {
            if ($route->match()) return $route;
        }
        throw new NotFoundException();
    }
}
