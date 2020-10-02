<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Bramus\Router\Router;

$router = new Router();

$router->get('/', 'App\Controllers\HomeController@index');
$router->get('/users/{userID}', 'App\Controllers\UserController@show');
$router->post('/users', 'App\Controllers\UserController@store');

// ajax

$router->get('/api/regions', 'App\Controllers\TerritoryApiController@regions');
$router->get('/api/cities/{regionID}', 'App\Controllers\TerritoryApiController@cities');
$router->get('/api/districts/{cityID}', 'App\Controllers\TerritoryApiController@districts');

$router->run();
