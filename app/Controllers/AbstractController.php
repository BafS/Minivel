<?php

namespace App\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

abstract class AbstractController extends Controller
{
    public function json($data, $status = 200)
    {
        return new JsonResponse($data, $status);
    }
}