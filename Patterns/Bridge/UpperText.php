<?php

declare(strict_types=1);

class UpperText implements BridgeInterface
{
    public function formatText(string $text): string
    {
        return strtoupper($text);
    }
}