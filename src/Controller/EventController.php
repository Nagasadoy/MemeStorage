<?php

//declare(strict_types=1);

namespace App\Controller;

use App\Service\Dispatcher\XBiggerFourEvent;
use App\Service\Dispatcher\AcmeListener;
use App\Service\Dispatcher\AnotherListener;
use App\Service\Dispatcher\XSmallerFourEvent;
use App\Service\Dispatcher\XSmallerFourListener;
use App\Service\Dispatcher\XSubscriber;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\EventDispatcher\Event;


class EventController extends AbstractController
{
    #[Route('/event')]
    public function index(EventDispatcherInterface $eventDispatcher): Response
    {
        $dispatcher = new EventDispatcher();
//        $dispatcher->addListener(XBiggerFourEvent::NAME, [new AcmeListener(), 'onXBiggerFour']);
//        $dispatcher->addListener(XBiggerFourEvent::NAME, [new AnotherListener(), 'onEvent']);
//        $dispatcher->addListener(XSmallerFourEvent::NAME, [new XSmallerFourListener(), 'onXSmallerFour']);

        $dispatcher->addSubscriber(new XSubscriber());

        $x = rand(1, 10);
        if ($x > 4) {
            $event = new XBiggerFourEvent($x);
            $dispatcher->dispatch($event, XBiggerFourEvent::NAME);
        } else {
            $event = new XSmallerFourEvent($x);
            $dispatcher->dispatch($event, XSmallerFourEvent::NAME);
        }

        return new Response();
    }
}