<?php

declare(strict_types=1);

class Battle
{
    private Ship $ship1;
    private Ship $ship2;
    private int $ship1Quantity;
    private int $ship2Quantity;

    private Ship $winningShip;
    private Ship $losingShip;
    private bool $usedJediPowers;

    /**
     * Our complex fighting algorithm!
     *
     * @param Ship $ship1
     * @param $ship1Quantity
     * @param Ship $ship2
     * @param $ship2Quantity
     * @return array With keys winning_ship, losing_ship & used_jedi_powers
     */
    public function __construct(Ship $ship1, int $ship1Quantity, Ship $ship2, int $ship2Quantity)
    {
        $this->ship1 = $ship1;
        $this->ship2 = $ship2;
        $this->ship1Quantity = $ship1Quantity;
        $this->ship2Quantity = $ship2Quantity;
    }

    public function getWinningShip(): Ship
    {
        return $this->winningShip;
    }

    public function getLosingShip(): Ship
    {
        return $this->losingShip;
    }

    public function getUsedJediPowers(): bool
    {
        return $this->usedJediPowers;
    }

    public function battle()
    {
        $ship1Health = $this->ship1->getStrength() * $this->ship1Quantity;
        $ship2Health = $this->ship2->getStrength() * $this->ship2Quantity;

        $ship1UsedJediPowers = false;
        $ship2UsedJediPowers = false;
        while ($ship1Health > 0 && $ship2Health > 0) {
            if (isJediDestroyShipUsingTheForce($this->ship1)) {
                $ship2Health = 0;
                $ship1UsedJediPowers = true;

                break;
            }
            if (isJediDestroyShipUsingTheForce($this->ship2)) {
                $ship1Health = 0;
                $ship2UsedJediPowers = true;

                break;
            }

            $ship1Health -= ($this->ship2->getWeaponPower() * $this->ship2Quantity);
            $ship2Health -= ($this->ship1->getWeaponPower() * $this->ship1Quantity);
        }

        if ($ship1Health <= 0 && $ship2Health <= 0) {
            $this->winningShip = null;
            $this->losingShip = null;
            $this->usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
        } elseif ($ship1Health <= 0) {
            $this->winningShip = $this->ship2;
            $this->losingShip = $this->ship1;
            $this->usedJediPowers = $ship2UsedJediPowers;
        } else {
            $this->winningShip = $this->ship1;
            $this->losingShip = $this->ship2;
            $this->usedJediPowers = $ship1UsedJediPowers;
        }
    }

    public function isJediDestroyShipUsingTheForce(Ship $ship): bool
    {
        return mt_rand(1, 100) <= $ship->getJediFactor();
    }
}