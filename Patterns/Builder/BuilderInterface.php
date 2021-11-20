<?php

declare(strict_types=1);

interface BuilderInterface
{   
    public function create(): BuilderInterface;

    public function setTitle(string $title): BuilderInterface;

    public function setSubject(string $subject): BuilderInterface;

    public function setText(string $text): BuilderInterface;

    public function setDestination(string $destination): BuilderInterface;

    public function getMail(): Mail;
}