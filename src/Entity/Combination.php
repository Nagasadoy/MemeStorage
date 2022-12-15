<?php

namespace App\Entity;

use App\Repository\CombinationRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

#[ORM\Entity(repositoryClass: CombinationRepository::class)]
class Combination
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(targetEntity: User::class, inversedBy: 'users')]
    #[Groups('users')]
    private User $user;

    #[ORM\ManyToOne(targetEntity: Meme::class)]
    private array $memes;

    #[ORM\ManyToOne(targetEntity: Tag::class)]
    private array $tags;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
