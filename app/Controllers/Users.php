<?php

namespace App\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

class Users extends AbstractController
{
    public function __construct(private readonly UserRepository $users)
    {
    }

    public function index(): JsonResponse
    {
        return $this->json($this->users->find());
    }

    public function show(int $id): JsonResponse
    {
        return $this->json($this->users->findOne($id));
    }
}
