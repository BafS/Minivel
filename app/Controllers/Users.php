<?php

namespace App\Controllers;

use App\Repositories\UserRepository;

class Users extends AbstractController
{
    private $users;

    public function __construct(UserRepository $users)
    {
        $this->users = $users;
    }

    public function index()
    {
        return $this->json($this->users->find());
    }

    public function show(int $id)
    {
        return $this->json($this->users->findOne($id));
    }
}
