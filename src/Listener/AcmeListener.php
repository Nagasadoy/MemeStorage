<?php

namespace App\Listener;

use Symfony\Contracts\EventDispatcher\Event;

class AcmeListener
{
    public function onFooAction(Event $event): void
    {
        echo 'foo';
    }
}