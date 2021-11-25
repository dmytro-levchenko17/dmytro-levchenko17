<?php

declare(strict_types=1);

class LowerText implements BridgeInterface
{
    public function formatText(string $text): string
    {
        return strtolower($text);
    }
}