<?php

namespace App\Service\Dispatcher;

class XSmallerFourEvent
{
    private int $x;

    public const NAME = 'x_smaller_four.event';

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function getX(): string
    {
        return $this->x;
    }
}