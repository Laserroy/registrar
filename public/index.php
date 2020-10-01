<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/', 'App\Controllers\HomeController@index');
$router->post('/users', 'App\Controllers\UserController@store');

// ajax

$router->get('/regions', 'App\Models\Territory@getRegions');
$router->get('/cities/{regionID}', 'App\Models\Territory@getCities');
$router->get('/districts/{cityID}', 'App\Models\Territory@getDistricts');

$router->run();
