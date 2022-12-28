<?php

namespace App\Mail;

class TransportChain
{
    private $transports;

    public function __construct()
    {
        $this->transports = [];
    }

    public function addTransport(MailerTransport $transport, $alias): void
    {
        $this->transports[$alias] = $transport;
    }

    public function getTransport($alias): ?MailerSmtpTransport
    {
        if(array_key_exists($alias, $this->transports)) {
            return $this->transports[$alias];
        }

        return null;
    }
}