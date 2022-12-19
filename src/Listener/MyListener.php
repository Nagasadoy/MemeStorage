<?php

namespace App\Listener;

use Symfony\Component\HttpKernel\Event\ResponseEvent;

class MyListener
{
    public function onResponse(ResponseEvent $event)
    {
        // Ко всем ответам теперь будет добавляться дата выдачи ответа

        $response = $event->getResponse();
        $content = $response->getContent();
        if ($content !== false) {
           $content = json_decode($content, true);
           $content['date_of_application'] = (new \DateTimeImmutable())->format('d.m.Y: h:i:s');
           $content = json_encode($content);
        }
        $response->setContent($content);
    }
}