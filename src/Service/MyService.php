<?php

namespace App\Service;

class MyService
{

    public function __construct(private readonly string $state)
    {
    }

    public function getState(): string
    {
        return 'This state is ' . $this->state;
    }
}