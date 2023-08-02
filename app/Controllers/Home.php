<?php

namespace App\Controllers;

use App\Services\Config;
use Illuminate\Http\JsonResponse;

class Home extends AbstractController
{
    public function index(Config $config): JsonResponse
    {
        return $this->json($config->get('app')['name']);
    }
}
