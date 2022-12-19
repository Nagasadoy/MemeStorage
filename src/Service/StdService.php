<?php

namespace App\Service;

class StdService implements TransformTextInterface
{

    public function transform(string $text): string
    {
        return $text;
    }
}