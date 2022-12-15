<?php

namespace App\Entity;

use App\Repository\MemeRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MemeRepository::class)]
class Meme
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private string $fileName;

    public function getId(): ?int
    {
        return $this->id;
    }
}
