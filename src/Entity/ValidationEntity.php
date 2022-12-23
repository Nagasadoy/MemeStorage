<?php

namespace App\Entity;

use Symfony\Component\Validator\Constraints as Assert;

class ValidationEntity
{
    #[Assert\NotBlank]
    #[Assert\Length(min: 3, minMessage: 'Имя слишком короткое, минимальная длина 3 символа')]
    private string $name;

    #[Assert\Positive]
    #[Assert\GreaterThan(17, message: 'Минимальный возраст 18 лет')]
    private int $age;

    #[Assert\Choice(choices: ['male', 'female'])]
    private string $gender;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;
    }

    public function __toString(): string
    {
        return $this->name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function getGender(): string
    {
        return $this->gender;
    }
}