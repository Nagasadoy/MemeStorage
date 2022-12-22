<?php

namespace App\Service\Messenger;

class MyMessageHandler
{
    public function __invoke(MyMessage $message)
    {
        echo 'Какая-то обработка сообщения: ' . $message->getContent();
    }
}