<?php

namespace App\Service;

class ToLowerService implements TransformTextInterface
{

    public function transform(string $text): string
    {
        return strtolower($text);
    }
}