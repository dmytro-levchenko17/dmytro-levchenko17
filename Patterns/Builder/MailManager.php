<?php

declare(strict_types=1);

require __DIR__ . '/BuilderInterface.php';

class MailManager
{
    private $builder;
    
    public function setBuilder(BuilderInterface $builder)
    {
        $this->builder = $builder;
        return $this;
    }

    public function createMail()
    {
        $mail = $this->builder->getMail();
        return $mail;
    }
}