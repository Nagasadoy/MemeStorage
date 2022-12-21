<?php

namespace App\Service\Dispatcher;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class XSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            XBiggerFourEvent::NAME => [['xBiggerFour'], ['doSomething']],
            XSmallerFourEvent::NAME => ['xSmallerThan']
        ];
    }

    public function xBiggerFour(XBiggerFourEvent $event)
    {
        echo 'x equal ' . $event->getX() . '<br>';
        echo 'x bigger than 4';

        $event->stopPropagation();
    }

    public function doSomething(XBiggerFourEvent $event)
    {
        echo 'x = ' . $event->getX() . '<br>';
    }

    public function xSmallerThan()
    {
        echo 'x smaller than 4';
    }
}