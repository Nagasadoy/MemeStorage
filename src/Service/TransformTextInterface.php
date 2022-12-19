<?php

namespace App\Service;

interface TransformTextInterface
{
    public function transform(string $text): string;
}