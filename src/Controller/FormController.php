<?php

namespace App\Controller;

use App\Entity\Task;
use App\FormType\TaskType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Validator\Constraints\GreaterThan;
use Symfony\Component\Validator\Constraints\LengthValidator;
use Symfony\Component\Validator\Constraints\NotBlank;

class FormController extends AbstractController
{
    #[Route('/form')]
    public function index(): Response
    {
        // creates a task object and initializes some data for this example
        $task = new Task();
        $task->setTask('Write a blog post');
        $task->setDueDate(new \DateTime('tomorrow'));

//        $form = $this->createFormBuilder($task)
//            ->add('task', TextType::class)
//            ->add('dueDate', DateType::class)
//            ->add('save', SubmitType::class, ['label' => 'Create Task'])
//            ->getForm();

        $form = $this->createForm(TaskType::class, $task);

//        $form = $this->createForm(TaskType::class, $task, [
//            'require_due_date' => $dueDateIsRequired,
//        ]);

        return $this->render('task/new.html.twig', [
            'form' => $form
//            'defaults' => $defaults
        ]);

    }
}