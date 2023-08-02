<?php

/**
 * Bootstrap
 * Thanks to Torch for some example https://github.com/mattstauffer/Torch
 */

use Illuminate\Http\Request;
use Illuminate\Routing\CallableDispatcher;
use Illuminate\Routing\Contracts\CallableDispatcher as CallableDispatcherContract;
use Illuminate\Routing\Router;
use Illuminate\Routing\Pipeline;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

require_once '../vendor/autoload.php';

$container = new Container;

// Set global instance
Container::setInstance($container);

// Register CallableDispatcher
$container->singleton(CallableDispatcherContract::class, CallableDispatcher::class);

// Load services
require_once __DIR__ . '/../app/services.php';

// Using Illuminate/Events/Dispatcher here (not required); any implementation of
// Illuminate/Contracts/Event/Dispatcher is acceptable
$events = new Dispatcher($container);

// Create the router instance
$router = new Router($events, $container);

// Global middlewares
$globalMiddleware = [
//    \App\Middleware\StartSession::class,
];

// Route middlewares
$routeMiddleware = [
    'hello' => \App\Middleware\Hello::class,
];

// Load middlewares to router
foreach ($routeMiddleware as $key => $middleware) {
    $router->aliasMiddleware($key, $middleware);
}

// Load the routes
require_once __DIR__ . '/../routes/api.php';

// Create a request from server variables
$request = Request::capture();

// Dispatching the request
// Pass the request through the global middlewares pipeline then dispatch it through the router
$response = (new Pipeline($container))
    ->send($request)
    ->through($globalMiddleware)
    ->then(static fn (Request $request) => $router->dispatch($request));

// Send the response back to the browser
$response->send();
