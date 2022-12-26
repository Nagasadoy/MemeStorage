<?php

namespace App\Service\Serializer;

use DateTimeInterface;
use Symfony\Component\Serializer\Annotation\Context;
use Symfony\Component\Serializer\Normalizer\DateTimeNormalizer;

class Person
{
    private string $name;
    private int $age;
    private string $gender;
    private bool $hasHighEducation;

//    #[Context([DateTimeNormalizer::FORMAT_KEY => 'd.m.Y'])]
    #[Context(
        normalizationContext: [DateTimeNormalizer::FORMAT_KEY => 'Y-m-d'],
        denormalizationContext: [DateTimeNormalizer::FORMAT_KEY => DateTimeInterface::RFC3339],
    )]
    private \DateTimeImmutable $createdAt;

    public function __construct(string $name, int $age, string $gender)
    {
        $this->name = $name;
        $this->age = $age;
        $this->gender = $gender;

        $this->createdAt = new \DateTimeImmutable();
    }

    public function setHighEducation(bool $value): void
    {
        $this->hasHighEducation = $value;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @return string
     */
    public function getGender(): string
    {
        return $this->gender;
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    /**
     * @return bool
     */
    public function isHasHighEducation(): bool
    {
        return $this->hasHighEducation;
    }

}