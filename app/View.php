<?php

namespace App;

use League\Plates\Engine;
use League\Plates\Template\Template;

class View
{
    private Engine $engine;
    public $stack = [];
    private $loaded = [
        'lib' => [],
        'css' => [],
        'js' => []
    ];

    private static array $jsLibrary = [
        'alpine' => '<script src="https://unpkg.com/alpinejs@3.10.2/dist/cdn.js" defer></script>',
        'alpine/collapse' => '<script src="https://unpkg.com/@alpinejs/collapse@3.10.2/dist/cdn.min.js" defer></script>',
        'axios' => '<script src="https://unpkg.com/axios@0.27.2/dist/axios.min.js"></script>',
        'tinymce' => '<script src="https://cdn.tiny.cloud/1/orquwf4cjw6axvonhne86ri8ndnic5g0cx4bytrfxmz8dm1h/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>',
        'moment' => '<script src="https://momentjs.com/downloads/moment.js"></script>',
        'flowbite' => '<script src="/node_modules/flowbite/dist/flowbite.js" defer></script>',
    ];

    public function __construct()
    {
        $this->engine = new Engine(ROOT_DIR . '/templates');   
        $this->engine->addFolder('layouts', ROOT_DIR .'/templates/layouts');
        $this->engine->addFolder('components', ROOT_DIR .'/templates/components');
        $this->engine->addFolder('pages', ROOT_DIR .'/templates/pages');
    }

    public function start($name, $data = [])
    {
        ob_start();
        array_push($this->stack, compact('name', 'data'));
    }

    public function end() 
    {
        $section = array_pop($this->stack);
        $name = $section['name'];
        $data = $section['data'];
        $data['content'] = ob_get_clean();
        echo $this->engine->make($name)->render($data);
    }

    public function page($template, $data = []) : Template
    {
        $template =  $this->engine->make('pages::' . $template);
        $template->data($data);
        return $template;
    }

    public function components($template) : Template
    {
        return $this->engine->make('components::' . $template);
    }

    public function lib($key)
    {        
        if ($this->load('lib', $key))
            return static::$jsLibrary[$key] . "\n";
    }

    public function load($type, $key) {
        if (in_array($key, $this->loaded[$type]))
            return false;
        
        array_push($this->loaded[$type], $key);
        return true;
    }

    public function css($filename, $version = '1.0')
    {
        $source = asset('css/' . $filename . '.css?v='.$version);

        if ($this->load('css', $filename))
            return "<link rel='stylesheet' href='$source'>\n";
    }

    public function js($filename)
    {
        $source = asset('js/' . $filename . '.js');

        if ($this->load('js', $filename))
            return "<script src='$source'></script>\n";
    }

    public function data($key, $value)
    {
        return "<script>window.$key = ".  json_encode($value) . "</script>\n";
    }

}
