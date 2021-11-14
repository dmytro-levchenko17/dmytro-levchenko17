<?php

declare(strict_types=1);

class BattleHistory
{
    private int $battleId;
    private string $ship1Name;
    private int $ship1Health;
    private int $ship1Q;
    private string $ship2Name;
    private int $ship2Health;
    private int $ship2Q;
    private string $winner;
    private string $battleDate;

    public function __construct(int $battleId, string $ship1Name, int $ship1Health, int $ship1Q, string $ship2Name, int $ship2Health, int $ship2Q, string $winner, string $battleDate) {
        $this->battleId = $battleId;
        $this->ship1Name = $ship1Name;
        $this->ship1Health = $ship1Health;
        $this->ship1Q = $ship1Q;
        $this->ship2Name = $ship2Name;
        $this->ship2Health = $ship2Health;
        $this->ship2Q = $ship2Q;
        $this->winner = $winner;
        $this->battleDate = $battleDate;
    }

    public function getBattleId(): int
    {
        return $this->battleId;
    }

    public function getShip1(): string
    {
        return $this->ship1Name;
    }

    public function getShip1Health(): int
    {
        return $this->ship1Health;
    }

    public function getShip1Q(): int
    {
        return $this->ship1Q;
    }

    public function getShip2Name(): string
    {
        return $this->ship2Name;
    }

    public function getShip2Health(): int
    {
        return $this->ship2Health;
    }

    public function getShip2Q(): int
    {
        return $this->ship2Q;
    }

    public function getWinner(): string
    {
        return $this->winner;
    }

    public function getBattleDate(): string
    {
        return $this->battleDate;
    }
}