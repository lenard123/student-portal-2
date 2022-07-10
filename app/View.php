<?php

namespace App;

use League\Plates\Engine;
use League\Plates\Template\Template;

class View
{
    private Engine $engine;

    private static array $jsLibrary = [
        'alpine' => '<script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.min.js" defer></script>',
        'axios' => '<script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>',
    ];

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

    public function lib($key)
    {
        return static::$jsLibrary[$key] . "\n";
    }

    public function css($filename)
    {
        $source = asset('css/' . $filename . '.css');
        return "<link rel='stylesheet' href='$source'>\n";
    }

    public function js($filename)
    {
        $source = asset('js/' . $filename . '.js');
        return "<script src='$source'></script>\n";
    }

}
