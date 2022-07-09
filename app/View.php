<?php

namespace App;

use League\Plates\Engine;
use League\Plates\Template\Template;

class View
{
    protected Engine $engine;

    public function __construct()
    {
        $this->engine = new Engine(ROOT_DIR . '/templates');   
    }

    public function page($template) : Template
    {
        return $this->engine->make('pages/' . $template);
    }

    public function components($template) : Template
    {
        return $this->engine->make('components/' . $template);
    }
}
// namespace App;

// use League\Plates\Engine;

// class View extends Engine
// {
//     protected Engine $engine;
//     protected string $template;
//     protected array $data;

//     public function __construct()
//     {
//         $this->engine = new Engine(ROOT_DIR . '/templates');   
//     }

//     public function page($template = null, $data = array())
//     {
//         return $this->render('pages/'.$template, $data);
//     }

//     public function components($)

//     public function render($template = null, $data = array())
//     {
//         $template ??= $this->template;
//         $data ??= $this->data;
//         return $this->engine->render($template, $data);         
//     }

//     public static function make($template, $data = array())
//     {
//         // return 
//     }

// }
