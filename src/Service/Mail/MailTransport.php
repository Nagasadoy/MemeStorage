<?php

namespace App\Service\Mail;

use App\Event\MailSendEvent;
use App\Subscriber\MailSendSubscriber;
use Symfony\Component\EventDispatcher\EventDispatcher;

class MailTransport
{
    private iterable $mailers = [];

    public function __construct(iterable $mailers)
    {
        $this->mailers = $mailers;
    }

    public function sendWithAllMailers()
    {
        foreach ($this->mailers as $mailer) {
            $mailer->send();
        }


        $subscriber = new MailSendSubscriber();

        $event = new MailSendEvent('test');
        $dispatcher = new EventDispatcher();

        $dispatcher->dispatch($event, MailSendEvent::NAME);
        $dispatcher->addSubscriber($subscriber);
    }
}