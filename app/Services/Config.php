<?php

namespace App\Services;

final class Config
{
    public function __construct(private readonly array $data)
    {
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }
}
