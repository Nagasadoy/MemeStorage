<?php

namespace App\Controller;

use App\Entity\Tag;
use App\Entity\ValidationEntity;
use App\Repository\TagRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Positive;
use Symfony\Component\Validator\Validation;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class ValidatorController extends AbstractController
{
    #[Route('/validator', methods: ['GET'])]
    public function index(ValidatorInterface $validator): Response
    {
//        $str = 'fd fdFas fd';
//        $number = rand(-10, 10);
//
//        $validator = Validation::createValidator();

//        $violations = $validator->validate($str, [
//            new Length(['min' => 3]),
//            new NotBlank()
//        ]);

//        $violations = $validator->validate($number,[
//            new Positive(),
//            new GreaterThan(5)
//        ]);
//
//        if (0 !== count($violations)) {
//            // there are errors, now you can show them
//            foreach ($violations as $violation) {
//                echo $violation->getMessage().'<br>';
//            }
//        }

//        $tag = new Tag();
//        $tag->setTitle('ffffffffffffffffffffffffffffffffffffffffffffffffffffffffffff');
//
//        return $this->json([
//            'tag' => $tag->getTitle()
//        ]);

        $validationEntity = new ValidationEntity('fi', 11, 'female');

        $errors = $validator->validate($validationEntity);
        if (count($errors) > 0) {
            $errorsString = '';
            foreach ($errors as $error){
                $errorsString .= $error->getMessage() . PHP_EOL;
            }
            throw new BadRequestHttpException($errorsString);
        }

        return $this->json([
           'entity' => $validationEntity
        ]);
    }
}