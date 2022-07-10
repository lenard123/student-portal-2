<?php

namespace App;

use App\Controllers\BaseController;
use League\Plates\Template\Template;

class Response
{
    const TYPE_VIEW = 'view';
    const TYPE_JSON = 'json';

    private string $type;
    private $data;
    private Template $view;
    private array $headers = [];
    private int $status = 200;

    public function render()
    {
        $this->setHeader();

        switch ($this->type) {
            case static::TYPE_VIEW: {
                return $this->renderView();
            }

            default: {
                return $this->renderJson();
            }
        }
    }

    public function addHeader(string $header) : void
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
        foreach ($this->headers as $header) {
            header($header);
        }
    }

    public static function view($template) : Response
    {
        $response = new Response();
        $response->type = static::TYPE_VIEW;
        $response->view = view()->page($template);
        return $response;
    }
    

    public static function json($data) : Response
    {
        $response = new Response();
        $response->type = static::TYPE_JSON;
        $response->data = $data;
        return $response;
    }

    public static function call($action) : Response
    {
        if (is_subclass_of($action, BaseController::class)) {
            $controller = new $action;
            $result = $controller();
            return static::make($result);
        }
        return new Response;
    }

    public static function make($result) : Response
    {
        if (is_subclass_of($result, Response::class)) {
            return $result;
        }

        if (is_subclass_of($result, Template::class)) {
            return Response::view($result);
        }

        return Response::json($result);
    }
}