<?php

namespace App\Services;

class Config
{
    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function get($key)
    {
        return $this->data[$key] ?? null;
    }
}
