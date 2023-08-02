<?php

namespace App\Repositories;

class UserRepository
{
    /** @var array<array<string, mixed>> */
    private array $db = [
        [
            'name' => 'Niels',
            'age' => 50,
        ],
        [
            'name' => 'Albert',
            'age' => 42,
        ],
    ];

    public function findOne(int $id): ?array
    {
        return $this->db[$id] ?? null;
    }

    public function find(): array
    {
        return $this->db ?? [];
    }
}
