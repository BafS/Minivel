<?php

/** @var \Illuminate\Container\Container $container */

use App\Services\Config;

$container->singleton(Config::class, function () {
    return new Config([
        'app' => [
            'name' => 'Minivel',
        ],
    ]);
});
