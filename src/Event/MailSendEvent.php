<?php

namespace App\Event;

use Symfony\Contracts\EventDispatcher\Event;

class MailSendEvent extends Event
{
    public const NAME = 'mail.send';

    public function __construct(private readonly string $letter)
    {
    }

    public function getLetter(): string
    {
        return $this->letter;
    }



}