<?php

namespace App\Message;

class SmsNotification
{
    public function __construct(private readonly string $content)
    {
    }

    public function getContent()
    {
        return $this->content;
    }
}