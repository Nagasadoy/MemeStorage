<?php

namespace App\Controller;

use App\Message\SmsNotification;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Messenger\Stamp\DelayStamp;
use Symfony\Component\Routing\Annotation\Route;

class MessengerController extends AbstractController
{
    #[Route('/sendMessage')]
    public function index(MessageBusInterface $bus, Request $request)
    {
        $message = 'New MESSAGE! =)' . rand(0, 1000);

//        $bus->dispatch(new SmsNotification($message), [
//            new DelayStamp(1000)
//        ]);
        $bus->dispatch(new SmsNotification($message));

        return $this->json([
            'message' => $message
        ]);
    }
}