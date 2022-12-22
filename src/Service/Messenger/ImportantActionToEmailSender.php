<?php

namespace App\Service\Messenger;

use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Envelope;
use Symfony\Component\Messenger\Transport\Sender\SenderInterface;
use Symfony\Component\Mime\Email;

class ImportantActionToEmailSender implements SenderInterface
{
    private $mailer;
    private $toEmail;

    public function __construct(MailerInterface $mailer, string $toEmail)
    {
        $this->mailer = $mailer;
        $this->toEmail = $toEmail;
    }

    public function send(Envelope $envelope): Envelope
    {
        $message = $envelope->getMessage();

//        if (!$message instanceof ImportantAction) {
//            throw new \InvalidArgumentException(sprintf('This transport only supports "%s" messages.', ImportantAction::class));
//        }

        $this->mailer->send(
            (new Email())
                ->from('dimabor9@mail.ru')
                ->to($this->toEmail)
                ->subject('Important action made')
                ->html('<h1>Important action</h1><p>Made by '.$message->getUsername().'</p>')
        );

        return $envelope;
    }
}