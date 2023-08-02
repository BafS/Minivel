<?php

namespace App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    public function json(mixed $data, int $status = 200): JsonResponse
    {
        return new JsonResponse($data, $status);
    }
}