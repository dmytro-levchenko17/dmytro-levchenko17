<?php

function get_ships(): array
{
    return [
        $starFighter = (new Ship())
            ->setName('Jedi Starfighter')
            ->setWeaponPower(5)
            ->setStrength(15)
            ->setJediFactor(30)
        ,
        $cloakShapeFighter = (new Ship())
            ->setName('CloakShape Fighter')
            ->setWeaponPower(2)
            ->setStrength(70)
            ->setJediFactor(2)
        ,
        $superStarDestroyer = (new Ship())
            ->setName('Super Star Destroyer')
            ->setWeaponPower(70)
            ->setStrength(500)
            ->setJediFactor(0)
        ,
        $rz1AWingInterceptor = (new Ship())
            ->setName('RZ-1 A-wing interceptor')
            ->setWeaponPower(4)
            ->setStrength(50)
            ->setJediFactor(4)
    ];
}

/**
 * Our complex fighting algorithm!
 *
 * @param array $ship1
 * @param $ship1Quantity
 * @param array $ship2
 * @param $ship2Quantity
 * @return array With keys winning_ship, losing_ship & used_jedi_powers
 */
function battle(array $ship1, $ship1Quantity, array $ship2, $ship2Quantity): array
{
    $ship1Health = $ship1['strength'] * $ship1Quantity;
    $ship2Health = $ship2['strength'] * $ship2Quantity;

    $ship1UsedJediPowers = false;
    $ship2UsedJediPowers = false;
    while ($ship1Health > 0 && $ship2Health > 0) {
        if (isJediDestroyShipUsingTheForce($ship1)) {
            $ship2Health = 0;
            $ship1UsedJediPowers = true;

            break;
        }
        if (isJediDestroyShipUsingTheForce($ship2)) {
            $ship1Health = 0;
            $ship2UsedJediPowers = true;

            break;
        }

        $ship1Health -= ($ship2['weapon_power'] * $ship2Quantity);
        $ship2Health -= ($ship1['weapon_power'] * $ship1Quantity);
    }

    if ($ship1Health <= 0 && $ship2Health <= 0) {
        $winningShip = null;
        $losingShip = null;
        $usedJediPowers = $ship1UsedJediPowers || $ship2UsedJediPowers;
    } elseif ($ship1Health <= 0) {
        $winningShip = $ship2;
        $losingShip = $ship1;
        $usedJediPowers = $ship2UsedJediPowers;
    } else {
        $winningShip = $ship1;
        $losingShip = $ship2;
        $usedJediPowers = $ship1UsedJediPowers;
    }

    return [
        'winning_ship' => $winningShip,
        'losing_ship' => $losingShip,
        'used_jedi_powers' => $usedJediPowers,
    ];
}

function isJediDestroyShipUsingTheForce(array $ship): bool
{
    return mt_rand(1, 100) <= $ship['jedi_factor'];
}