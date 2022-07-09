<?php

namespace App;

use League\Plates\Template\Template;

class Response
{
    const TYPE_VIEW = 'view';

    private string $type;
    private Template $view;

    public function render()
    {
        switch ($this->type) {
            case static::TYPE_VIEW: {
                return $this->renderView();
            }
        }
    }

    private function renderView()
    {
        echo $this->view->render();
    }

    public static function view($template) : Response
    {
        $response = new Response();
        $response->type = static::TYPE_VIEW;
        $response->view = view()->page($template);

        return $response;
    }
}