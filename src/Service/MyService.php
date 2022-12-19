<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class MyService
{

    private string $state;
    private ?WrapperClass $wrapper;

    public function __construct(
//        private readonly string $state,
        #[Autowire('%app.state%')] string $state, // вот так можно не писать даже ничего в services.yaml
        private readonly TransformTextInterface $std,
        private Complex $complex
    )
    {
        $this->state = $state;
        $this->wrapper = null;
    }

    public function getState(): string
    {
        $text = 'This state is ' . $this->state;
        if(null !== $this->wrapper) {
            $text = $this->wrapper->wrap($text);
        }

        return $this->std->transform($text);
    }

    public function exec(): string
    {
        return $this->complex->exec();
    }

    public function setWrapper(WrapperClass $wrapper): void
    {
        $this->wrapper = $wrapper;
    }
}