<?php

namespace App\Controller;

use App\Service\Mail\FirstMailer;
use App\Service\MyService;
use App\Service\Tag\TagService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TagController extends AbstractController
{
    #[Route('/tag')]
    public function index(TagService $tagService): Response
    {
        $tag = 3;
        return new Response();
    }
}