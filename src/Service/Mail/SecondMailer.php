<?php

namespace App\Service\Mail;

class SecondMailer implements MailerInterface
{
    public function send(): void
    {
        echo 'Send with second mailer' . PHP_EOL;
    }
}