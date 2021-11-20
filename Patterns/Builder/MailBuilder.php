<?php

declare(strict_types=1);

require __DIR__ . '/Mail.php';

class MailBuilder implements BuilderInterface
{   
    private Mail $mail;

    public function __construct()
    {
        $this->create();
    }

    public function create(): BuilderInterface
    {
        $this->mail = new Mail;

        return $this;
    }

    public function setTitle(string $title): BuilderInterface
    {
        $this->mail->title = $title;
        return $this;
    }


    public function setSubject(string $subject): BuilderInterface
    {
        $this->mail->subject = $subject;
        return $this;
    }

    public function setText(string $text): BuilderInterface
    {
        $this->mail->text = $text;
        return $this;
    }

    public function setDestination(string $destination): BuilderInterface
    {
        if ($destination === '') {
            throw new \Exception('Destination cannot be empty');
        }
        $this->mail->destination = $destination;
        return $this;
    }

    public function getMail(): Mail
    {
        $result = $this->mail;
        $this->create();

        return $result;
    }
}