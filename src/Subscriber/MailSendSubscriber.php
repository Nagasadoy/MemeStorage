<?php

namespace App\Subscriber;

use App\Event\MailSendEvent;
use Doctrine\Bundle\DoctrineBundle\EventSubscriber\EventSubscriberInterface;

class MailSendSubscriber implements EventSubscriberInterface
{

    public function getSubscribedEvents(): array
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