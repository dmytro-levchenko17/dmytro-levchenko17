<?php

declare(strict_types=1);

require __DIR__ . '/Render.php';

class Text extends Render
{
    public function output($text): string
    {
        return $this->bridgeInterface->formatText($text);
    }
}