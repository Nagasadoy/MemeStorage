<?php

namespace App\Service\Dispatcher;

use App\Listener\AcmeListener;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Contracts\EventDispatcher\Event;

class Dispatcher
{
    public function __construct()
    {
        $dispatcher = new EventDispatcher();
        $listener = new AcmeListener();

//        $dispatcher->addListener('acme.foo.action', [$listener, 'onFooAction']);

        $dispatcher->addListener('acme.foo.action', static function (Event $event) {
            dump($event);
        });

    }
}