<?php

namespace App\Service\Dispatcher;

use Symfony\Contracts\EventDispatcher\Event;

class XBiggerFourEvent extends Event
{
    private int $x;

    public const NAME = 'x_bigger_four.event';

    public function __construct($x)
    {
        $this->x = $x;
    }

    public function getX(): string
    {
        return $this->x;
    }


}