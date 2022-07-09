<?php

namespace App;

use League\Plates\Engine;

class View
{
    protected Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine();   
    }
}
