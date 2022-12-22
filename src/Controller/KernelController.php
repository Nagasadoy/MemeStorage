<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class KernelController extends AbstractController
{
    #[Route('/kernel')]
    public function index(): Response
    {
        throw new \Exception('error');

        return $this->json([
           'ok' => 'ok'
        ]);
    }
}