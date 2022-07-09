<?php

define('ROOT_DIR', __DIR__);
define('BASE_URL', 'https://8000-lenard123-studentportal-wnsrm44iew3.ws-us53.gitpod.io');

require __DIR__.'/vendor/autoload.php';
require __DIR__.'/app/__helpers.php';


$routes = require('routes.php');
$app = App\App::make($routes);
$app->boot();
$app->render();