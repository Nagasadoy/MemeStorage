<?php

namespace App\Service\Dispatcher;

use App\Listener\AcmeListener;
use App\Service\AcmeSubscriber;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBag;
use Symfony\Component\EventDispatcher\DependencyInjection\AddEventAliasesPass;
use Symfony\Component\EventDispatcher\DependencyInjection\RegisterListenersPass;
use Symfony\Component\EventDispatcher\EventDispatcher;

class CompilerPass
{
    public function __construct()
    {
        $containerBuilder = new ContainerBuilder(new ParameterBag());
        // register the compiler pass that handles the 'kernel.event_listener'
        // and 'kernel.event_subscriber' service tags
        $containerBuilder->addCompilerPass(new RegisterListenersPass());

        $containerBuilder->register('event_dispatcher', EventDispatcher::class);

        // registers an event listener
        $containerBuilder->register('listener_service_id', AcmeListener::class)
            ->addTag('kernel.event_listener', [
                'event' => 'mail.send',
                'method' => 'onFooAction',
            ]);

        // registers an event subscriber
        $containerBuilder->register('subscriber_service_id', AcmeSubscriber::class)
            ->addTag('kernel.event_subscriber');


        /*****************************************************/

//        $containerBuilder = new ContainerBuilder(new ParameterBag());
//        $containerBuilder->addCompilerPass(
//            new AddEventAliasesPass([
//                \AcmeFooActionEvent::class => 'acme.foo.action',
//            ])
//        );
//        $containerBuilder->addCompilerPass(new RegisterListenersPass(), PassConfig::TYPE_BEFORE_REMOVING);
//
//        $containerBuilder->register('event_dispatcher', EventDispatcher::class);
//
//        // registers an event listener
//        $containerBuilder->register('listener_service_id', \AcmeListener::class)
//            ->addTag('kernel.event_listener', [
//                // will be translated to 'acme.foo.action' by RegisterListenersPass.
//                'event' => \AcmeFooActionEvent::class,
//                'method' => 'onFooAction',
//            ]);
    }
}