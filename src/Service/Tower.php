<?php

namespace App\Service;

class Tower
{

    public function __construct(
        public readonly string $id,
        public readonly string $color,
        public readonly float $height
    )
    {
    }

    public function getDescription(): string
    {
        return 'This tower id=' . $this->id . ' ' . $this->color . ' color' . ' height=' . $this->height;
    }

}