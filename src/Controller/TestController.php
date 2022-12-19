<?php

namespace App\Controller;

use App\Entity\Meme;
use App\Service\MyService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

#[Route('/meme', name: 'meme_')]
class TestController extends AbstractController
{
    #[Route('/', name:'index', methods: ['GET'])]
    public function index(MyService $myService): Response
    {
//        $stateApp = $this->getParameter('app.state'); // получить переменную окружения прямо из контроллера

        return $this->json([
            'msg' => 'hello world',
            'state' => $myService->getState(),
            'exec' => $myService->exec()
        ]);
    }

    #[Route(
        path: '/test/{page}',
        name: 'test_page',
        requirements: ['page' => '\d+'],
        defaults: ['title' => 'helloTitle'],
        methods: ['GET']
    )]
    public function test(string $title, int $page = 1): Response
    {
        return $this->json([
            'page' => $page,
            'title' => $title
        ]);
    }

    #[Route('/redirect')]
    public function redirectToHomePage(): Response
    {
        return $this->redirectToRoute('meme_index', [], Response::HTTP_FOUND);
    }

    #[Route('/exception')]
    public function throwException(): Response
    {
        throw $this->createNotFoundException('мем не найден');
    }

    #[Route('/{id}', name: 'meme')]
    public function getMeme(Meme $meme)
    {
        return $this->json(['fileName' => $meme->getFileName()]);
    }
}