<?php

namespace App\Service\Tag;

use Symfony\Component\DependencyInjection\ContainerInterface;

class TagService
{
    public function __construct(private readonly ContainerInterface $container)
    {
    }

    public function getLock()
    {
        $lock = $this->container->get('app.lock');
        dd($lock);
    }
}