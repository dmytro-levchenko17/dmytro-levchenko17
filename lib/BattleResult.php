<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winningShip;
    private ?Ship $losingShip;
    private bool $isJediPowerUsed;

    public function __construct( ?Ship $winningShip, ?Ship $losingShip, bool $isJediPowerUsed ) {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->isJediPowerUsed = $isJediPowerUsed;
    }

    public function getWinningShip(): ?Ship
    {
        return $this->winningShip;
    }

    public function getLosingShip(): ?Ship
    {
        return $this->losingShip;
    }

    public function isJediPowerUsed(): bool
    {
        return $this->isJediPowerUsed;
    }
}