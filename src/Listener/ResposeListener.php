<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ResposeListener implements EventSubscriberInterface
{

    public static function getSubscribedEvents(): array
    {
       return [
          KernelEvents::RESPONSE => 'addContent'
       ];
    }

    public function addContent(ResponseEvent $event)
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