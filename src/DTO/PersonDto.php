<?php

namespace App\DTO;

class PersonDto
{
    private string $firstName;
    private string $lastName;
    private int $age;

    public function __construct(string $firstName, string $lastName, int $age)
    {
        $this->lastName = $lastName;
        $this->firstName = $firstName;
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

}