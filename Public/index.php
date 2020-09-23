<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/', 'App\Controllers\HomeController@index');



// ajax

$router->get('/regions', 'App\Territory@getRegions');

$router->run();
