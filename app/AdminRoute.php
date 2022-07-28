<?php 

namespace App;

class AdminRoute extends Route
{
    public $prefix = 'admin';

    public array $middlewares = [ 
        ['auth', ['admin']]
    ];
}