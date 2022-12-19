<?php

namespace App\Service;

class ToUpperService implements TransformTextInterface
{

    public function transform(string $text): string
    {
        return strtoupper($text);
    }
}