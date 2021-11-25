<?php

declare(strict_types=1);

abstract class Render
{
    public BridgeInterface $bridgeInterface;

    public function __construct(BridgeInterface $bridgeInterface)
    {
        $this->bridgeInterface = $bridgeInterface;
    }

    public function setText(BridgeInterface $text)
    {
        $this->bridgeInterface = $text;
    }

    abstract public function output($text): string;
}