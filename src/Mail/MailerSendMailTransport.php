<?php

namespace App\Mail;

class MailerSendMailTransport
{
    public function __construct()
    {
    }

    public function send(): void
    {
        echo 'Отправка почты' . PHP_EOL;
    }
}