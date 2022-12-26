<?php

namespace App\Controller;

use App\DTO\PersonDto;
use App\Service\Serializer\Person;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;

class SerializerController extends AbstractController
{
    #[Route('/serializer')]
    public function index(SerializerInterface $serializer, Request $request): Response
    {
        $content = $request->getContent();
        /** @var Person $person */
        $person = $serializer->deserialize($content, Person::class, 'json');
//        dd($person);

//        $person = new Person('vika', 23, 'female');

        $dto = new PersonDto($person->getName(), $person->getName() . 'ch', $person->getAge());

//        dd($dto);

        return $this->json([
            'person' => $dto
        ]);
    }

}