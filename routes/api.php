<?php

/** @var $router Router */

use Illuminate\Routing\Router;

$router->get('/', 'App\Controllers\Home@index');

$router->group(['middleware' => 'hello'], function (Router $router) {
    $router->get('/hello', function () {
        return 'Hello from route';
    });
});

$router->group(['prefix' => 'users', 'namespace' => 'App\Controllers'], function (Router $router) {
    $router->get('/', ['name' => 'users.index', 'uses' => 'Users@index']);
    $router->get('/{id}', ['name' => 'users.show', 'uses' => 'Users@show']);
});

// catch-all route
$router->any('{any}', function () {
    return 'Page not found';
})->where('any', '(.*)');
