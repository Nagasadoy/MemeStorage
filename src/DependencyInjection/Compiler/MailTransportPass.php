<?php

namespace App\DependencyInjection\Compiler;

use App\Mail\TransportChain;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Reference;

class MailTransportPass implements CompilerPassInterface
{

    public function process(ContainerBuilder $container): void
    {
        // always first check if the primary service is defined
        if (!$container->has(TransportChain::class)) {
            return;
        }

        $definition = $container->findDefinition(TransportChain::class);

        // find all service IDs with the app.mail_transport tag
        $taggedServices = $container->findTaggedServiceIds('app.mail_transport');

        foreach ($taggedServices as $id => $tags) {

            foreach ($tags as $attributes) {
                // add the transport service to the TransportChain service
                $definition->addMethodCall('addTransport', [
                    new Reference($id),
                    $attributes['alias']
                ]);
            }
        }
    }
}