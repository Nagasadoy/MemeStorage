<?php

namespace App\Service\Mail;

class FirstMailer implements MailerInterface
{
    public function send(): void
    {
        echo 'Send with first mailer' . PHP_EOL;
    }

}