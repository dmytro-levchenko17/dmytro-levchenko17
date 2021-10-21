<?php

declare(strict_types=1);

class BattleResult
{
    private ?Ship $winningShip;
    private ?Ship $losingShip;
    private ?int $winningShipHealth;
    private ?int $losingShipHealth;
    private bool $isJediPowerUsed;

    public function __construct( ?Ship $winningShip, ?Ship $losingShip, ?int $winningShipHealth, ?int $losingShipHealth, bool $isJediPowerUsed ) {
        $this->winningShip = $winningShip;
        $this->losingShip = $losingShip;
        $this->winningShipHealth = $winningShipHealth;
        $this->losingShipHealth = $losingShipHealth;
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

    public function getWinningShipHealth(): ?int
    {
        return $this->winningShipHealth;
    }

    public function getLosingShipHealth(): ?int
    {
        return $this->losingShipHealth;
    }

    public function isJediPowerUsed(): bool
    {
        return $this->isJediPowerUsed;
    }
}