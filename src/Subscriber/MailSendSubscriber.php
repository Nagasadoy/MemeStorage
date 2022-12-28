<?php

namespace App\Subscriber;

use App\Event\MailSendEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class MailSendSubscriber implements EventSubscriberInterface
{
    public static function getSubscribedEvents()
    {
        return [
            MailSendEvent::NAME => 'onMailSend'
        ];
    }

    public function onMailSend()
    {
        echo 'MAIL SEND!!!';
    }
}