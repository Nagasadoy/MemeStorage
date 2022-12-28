<?php

namespace App\Controller;

use App\Service\Mail\MailTransport;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MailController extends AbstractController
{
    #[Route('/mail')]
    public function index(MailTransport $mailTransport): Response
    {
//        throw new \Exception('fdsfs');
        $mailTransport->sendWithAllMailers();
        return new Response();
    }
}