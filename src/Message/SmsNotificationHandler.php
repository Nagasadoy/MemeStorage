<?php

namespace App\Message;

use App\Entity\Tag;
use App\Repository\TagRepository;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class SmsNotificationHandler
{
    public function __construct(private TagRepository $tagRepository)
    {
    }

    public function __invoke(SmsNotification $message)
    {
        echo 'Отправка письма... Текст: ' . $message->getContent();
        $newTag = new Tag();
        $newTag->setTitle($message->getContent());
        $this->tagRepository->save($newTag, true);
    }
}