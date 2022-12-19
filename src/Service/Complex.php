<?php

namespace App\Service;

class Complex
{
    private string $a;

    private int $b;

    private array $c;

    public function setA(string $a): void
    {
        $this->a = $a;
    }

    public function setB(int $b): void
    {
        $this->b = $b;
    }

    public function setC(array $c): void
    {
        $this->c = $c;
    }

    public function exec(): string
    {
        return $this->a . ' ' . $this->b . implode(';', $this->c);
    }
}