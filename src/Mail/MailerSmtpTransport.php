<?php

namespace App\Mail;

class MailerSmtpTransport
{
    public function __construct()
    {
    }

    public function send(): void
    {
        echo 'Отправка чеерз smtp' . PHP_EOL;
    }
}