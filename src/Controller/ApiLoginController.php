<?php

namespace App\Controller;

use App\Entity\User;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Http\Attribute\CurrentUser;

class ApiLoginController extends AbstractController
{
    #[Route('/api/login', name: 'api_login', methods: ['POST'])]
    public function index(#[CurrentUser] ?User $user): Response
    {
        // по сути можно просто достать из request логин и пароль и посмотреть есть ли такой пользователь в БД
        if (null === $user) {
            return $this->json([
                'message' => 'Неверные данные'
            ]);
        }

        $token = Uuid::uuid6();

        return $this->json([
           'token' => $token,
           'user' => $user->getUserIdentifier()
        ]);
    }
}
