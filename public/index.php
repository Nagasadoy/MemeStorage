<?php

use App\Kernel;
use App\Service\Messenger\ImportantActionToEmailSender;
use App\Service\Messenger\MyMessage;
use App\Service\Messenger\MyMessageHandler;
use App\Service\Serializer\Person;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Stamp\SerializerStamp;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Encoder\XmlEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};

// Начало сериалайзера
//$encoders = [new XmlEncoder(), new JsonEncoder()];
//$normalizers = [new ObjectNormalizer()];
//
//$serializer = new Serializer($normalizers, $encoders);
//
//$person = new Person('ivan', 45, 'male');
//
//$person->setHighEducation(false);
//
//$jsonContent = $serializer->serialize($person,'json');
//
//$person2 = $serializer->deserialize('{"name":"ivan","age":22,"gender":"male","hasHighEducation":false}',
//    Person::class,
//    'json'
//);

//var_dump($person2);
// Конец сериалайзера //

//$handler = new MyMessageHandler();
//
//$bus = new MessageBus([
//    new HandleMessageMiddleware(new HandlersLocator([
//        MyMessage::class => [$handler],
//    ])),
//]);
//
//$message= new MyMessage('message');
////$bus->dispatch($message);
//
////$envelope = new Envelope($message);
////$envelope = new \App\Service\Messenger\ImportantActionToEmailSender($envelope);
//
//
//$sender = new ImportantActionToEmailSender();
//
//// Добавление метаданных
//$bus->dispatch(
//    (new Envelope($message))->with(new SerializerStamp([
//        // groups are applied to the whole message, so make sure
//        // to define the group for every embedded object
//        'groups' => ['my_serialization_groups'],
//    ]))
//);
//
//return function (array $context) {
//    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
//};


/*Запускаем ядро сами и смотрим весь процесс работы*/

//$routes = new RouteCollection();
//
//$routes->add(
//    'hello',
//    new Route('/hello/{name}', [
//            '_controller' => function (Request $request) {
//                return new Response(
//                    sprintf("Hello %s", $request->get('name'))
//                );
//            }
//        ]
//    )
//);
//
//$routes->add(
//    'rnd',
//    new Route('/rnd', [
//        '_controller' => function (Request $request) {
//            return new \Symfony\Component\HttpFoundation\JsonResponse([
//                'rnd' => rand(1, 100)
//            ]);
//        }
//    ])
//);
//
//$matcher = new UrlMatcher($routes, new RequestContext());
//
//$dispatcher = new EventDispatcher();
//$dispatcher->addSubscriber(new RouterListener($matcher, new RequestStack()));
//
//$controllerResolver = new ControllerResolver();
//
//$argumentResolver = new ArgumentResolver();
//
//$httpKernel = new HttpKernel($dispatcher, $controllerResolver, new RequestStack(), $argumentResolver);
//
//$request = Request::createFromGlobals();
//
//$response = $httpKernel->handle($request);
//
// sends the headers and echoes the content
//$response->send();
//
// triggers the kernel.terminate event
//$httpKernel->terminate($request, $response);