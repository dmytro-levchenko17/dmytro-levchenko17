<?php

declare(strict_types=1);

interface BridgeInterface
{
    public function formatText(string $text): string;
}