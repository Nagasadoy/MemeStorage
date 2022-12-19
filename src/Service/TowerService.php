<?php

namespace App\Service;

class TowerService
{
    public function __construct(private Tower $tower)
    {
    }

    public function action(): string
    {
        return $this->tower->getDescription();
    }
}