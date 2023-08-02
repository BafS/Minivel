<?php

use App\Services\Config;

/** @var \Illuminate\Container\Container $container */
$container->singleton(Config::class, function () {
    return new Config([
        'app' => [
            'name' => 'Minivel',
        ],
    ]);
});
