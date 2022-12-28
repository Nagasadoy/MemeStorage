<?php

namespace App\Service\Mail;

use App\Event\MailSendEvent;
use App\Subscriber\MailSendSubscriber;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;

class MailTransport
{
    private iterable $mailers = [];

    private EventDispatcherInterface $eventDispatcher;

    public function __construct(iterable $mailers, EventDispatcherInterface $eventDispatcher)
    {
        $this->mailers = $mailers;
        $this->eventDispatcher = $eventDispatcher;
    }

    public function sendWithAllMailers()
    {
        foreach ($this->mailers as $mailer) {
            $mailer->send();
            $this->eventDispatcher->dispatch(new MailSendEvent('test'), MailSendEvent::NAME);
        }
    }
}