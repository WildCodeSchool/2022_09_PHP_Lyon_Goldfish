<?php

namespace App\Model;

use PDO;

class ConcertManager extends AbstractManager
{
    public const TABLE = 'concert';

    /**
     * Insert new concert in database
     */
    public function insert(array $concert): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`salle`, `ville`) VALUES (:salle, :ville)");
        $statement->bindValue(':salle', $concert['salle'], PDO::PARAM_STR);
        $statement->bindValue(':ville', $concert['ville'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update concert in database
     */
    public function update(array $concert): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET salle=:salle, 
        ville=:ville WHERE id=:id");
        $statement->bindValue('id', $concert['id'], PDO::PARAM_INT);
        $statement->bindValue(':salle', $concert['salle'], PDO::PARAM_STR);
        $statement->bindValue(':ville', $concert['ville'], PDO::PARAM_STR);
        return $statement->execute();
    }
}
