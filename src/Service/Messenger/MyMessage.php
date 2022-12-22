<?php

namespace App\Service\Messenger;

class MyMessage
{
    private \DateTimeImmutable $createdAt;

    public function __construct(private readonly string $content)
    {
        $this->createdAt = new \DateTimeImmutable();
    }

    public function getCreatedAt(): \DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function getContent()
    {
        return $this->content;
    }

}