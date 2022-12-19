<?php

namespace App\Service;

use Symfony\Component\DependencyInjection\Attribute\Autowire;

class WrapperClass
{
    private string $wrapSymbol;

    public function __construct(#[Autowire('#')]string $wrapSymbol)
    {
        $this->wrapSymbol = $wrapSymbol;
    }

    public function wrap(string $str): string
    {
        return $this->wrapSymbol . $str . $this->wrapSymbol;
    }
}