<?php

namespace App\Controller;

use App\Service\TowerService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/tower', name: 'tower_')]
class TowerController extends AbstractController
{
    #[Route('/')]
    public function index(TowerService $towerService): Response
    {
        return $this->json(['description' => $towerService->action()]);
    }
}