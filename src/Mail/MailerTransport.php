<?php

namespace App\Mail;

class MailerTransport
{
    public function __construct(private readonly string $name)
    {
    }

    public function getName(): string
    {
        return $this->name;
    }


}