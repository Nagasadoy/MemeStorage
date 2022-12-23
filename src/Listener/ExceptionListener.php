<?php

namespace App\Listener;

use Symfony\Component\EventDispatcher\Attribute\AsEventListener;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;

#[AsEventListener(event:ExceptionEvent::class, method: 'onKernelException', priority: 256)]
class ExceptionListener
{
    public function onKernelException(ExceptionEvent $event): void
    {
        // You get the exception object from the received event
        $exception = $event->getThrowable();
//        $message = sprintf(
//            'My Error says: %s with code: %s',
//            $exception->getMessage(),
//            $exception->getCode()
//        );

        // Customize your response object to display the exception details
        $response = new JsonResponse();
        $response->setContent($exception->getMessage());

        // HttpExceptionInterface is a special type of exception that
        // holds status code and header details
        if ($exception instanceof HttpExceptionInterface) {
            $response->setStatusCode($exception->getStatusCode());
            $response->headers->replace($exception->getHeaders());
        } else {
            $response->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR);
        }

//        $response->setStatusCode(Response::HTTP_OK);
//        $response->headers->replace($exception->getHeaders());

        // sends the modified response object to the event
        $event->setResponse($response);
    }
}