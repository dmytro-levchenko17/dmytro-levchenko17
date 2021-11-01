<?php

declare(strict_types=1);

class BattleLoader
{
    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function save(BattleResult $result)
    {
        $statement = $this->pdo->prepare('INSERT INTO battle_history (ship1, ship1_health, ship1_q, ship2, ship2_health, ship2_q, winner, battle_date) VALUES (:ship1, :ship1_health, :ship1_q, :ship2, :ship2_health, :ship2_q, :winner, NOW())');
        
        $statement->bindValue(':ship1', $result->getShip1()->getName());
        $statement->bindValue(':ship1_health', $result->getShip1HP());
        $statement->bindValue(':ship1_q', $result->getShip1Q());
        $statement->bindValue(':ship2', $result->getShip2()->getName());
        $statement->bindValue(':ship2_health', $result->getShip2HP());
        $statement->bindValue(':ship2_q', $result->getShip2Q());
        if ($result->getWinningShip() === null) {
            $statement->bindValue(':winner', 'Draw');
        } else {
            $statement->bindValue(':winner', $result->getWinningShip()->getName());
        }
        
        $statement->execute();
    }

    public function getBattles(int $offset, int $limit): array
    {
        $statement = $this->pdo->prepare("SELECT * FROM battle_history ORDER BY battle_date DESC LIMIT $offset, $limit");
        $statement->execute();
        $dbbattles = $statement->fetchAll(PDO::FETCH_ASSOC);

        $battles = [];
        foreach ($dbbattles as $dbbattle) {
            $battles[] = $this->transformDataToShip($dbbattle);
        }

        return $battles;
    }

    public function getBattlesCount(): string
    {
        $statement = $this->pdo->prepare("SELECT count(*) FROM battle_history" );
        $statement->execute();
        $count = $statement->fetchColumn();

        return $count;
    }

    private function transformDataToShip(array $data): BattleHistory
    {
        $battle = new BattleHistory(
            (int) $data['battle_id'],
            $data['ship1'],
            (int) $data['ship1_health'],
            (int) $data['ship1_q'],
            $data['ship2'],
            (int) $data['ship2_health'],
            (int) $data['ship2_q'],
            $data['winner'],
            $data['battle_date'],
        );

        return $battle;
    }
}