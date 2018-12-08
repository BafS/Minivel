<?php

namespace App\Controllers;

use App\Services\Config;

class Home extends AbstractController
{
    public function index(Config $config)
    {
        return $this->json($config->get('app')['name']);
    }
}
