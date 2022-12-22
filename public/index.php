<?php

use App\Kernel;
use Symfony\Component\EventDispatcher\EventDispatcher;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ArgumentResolver;
use Symfony\Component\HttpKernel\Controller\ControllerResolver;
use Symfony\Component\HttpKernel\EventListener\RouterListener;
use Symfony\Component\HttpKernel\HttpKernel;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

require_once dirname(__DIR__) . '/vendor/autoload_runtime.php';

return function (array $context) {
    return new Kernel($context['APP_ENV'], (bool) $context['APP_DEBUG']);
};




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