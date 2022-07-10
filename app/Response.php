<?php

namespace App;

use App\Controllers\BaseController;
use App\Exceptions\ResponseException;
use League\Plates\Template\Template;

class Response
{
    const TYPE_VIEW = 'view';
    const TYPE_JSON = 'json';
    const TYPE_NULL = 'null';
    const TYPE_REDIRECT = 'redirect';

    private string $type = self::TYPE_NULL;
    private $data = null;
    private Template $view;
    private array $headers = [];
    public int $status;

    public function __construct(int $status = 200)
    {
        $this->status = $status;
    }

    public function render()
    {
        $this->setHeader();

        switch ($this->type) {
            case static::TYPE_VIEW:
                return $this->renderView();

            case static::TYPE_JSON:
                return $this->renderJson();

            case static::TYPE_REDIRECT:
                return;
        }
    }

    public function addHeader(string $header): void
    {
        array_push($this->headers, $header);
    }

    private function renderView()
    {
        echo $this->view->render();
    }

    private function renderJson()
    {
        header('Content-Type: application/json');
        echo json_encode($this->data);
    }

    private function setHeader()
    {
        http_response_code($this->status);
        foreach ($this->headers as $header) {
            header($header);
        }
    }

    public static function view($template): Response
    {
        $response = new Response(200);
        $response->type = static::TYPE_VIEW;
        $response->view = $template;
        return $response;
    }


    public static function noContent() : Response
    {
        return new Response(204);
    }

    public static function redirect($url) : Response
    {
        $response = new Response(302);
        $response->type = static::TYPE_REDIRECT;
        $response->addHeader('Location: '. $url);
        return $response;
    }

    public static function json($data): Response
    {
        $response = new Response(200);
        $response->type = static::TYPE_JSON;
        $response->data = $data;
        return $response;
    }

    public static function call($action): Response
    {
        $result = null;

        if (is_callable($action)) {
            $result = $action();
        } else if (is_subclass_of($action, BaseController::class)) {
            $controller = new $action;
            $result = $controller();
        } else if (is_array($action)) {
            $controller = new $action[0];
            $method = $action[1];
            $result = $controller->$method();
        }

        return static::make($result);
    }


    public static function make($result): Response
    {
        if (is_subclass_of($result, Response::class)) {
            return $result;
        }

        if (is_a($result, Template::class)) {
            return Response::view($result);
        }

        if (is_null($result)) {
            return Response::noContent();
        }

        if (is_subclass_of($result, ResponseException::class)) {
            $response = new Response();
            $response->type = static::TYPE_JSON;
            $response->status = $result->getStatus();
            $response->data = $result;
            return $response;
        }

        return Response::json($result);
    }
}
