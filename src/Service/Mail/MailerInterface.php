<?php

namespace App\Service\Mail;

interface MailerInterface
{
    public function send(): void;
}