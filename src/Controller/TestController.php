<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TestController extends AbstractController
{
    #[Route('/', methods: ['GET'])]
    public function test(LoggerInterface $logger): Response
    {
        $msg = 'fdfsfdsfs';
        $logger->info($msg);
        return $this->json(['msg' => $msg]);
    }
}