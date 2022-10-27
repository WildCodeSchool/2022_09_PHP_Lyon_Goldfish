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
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE .
            " (`place`, `city`, `date`, `schedule`, `artist_id`) VALUES (:place, :city, :date, :schedule, :artist_id)");
        $statement->bindValue(':place', $concert['place'], PDO::PARAM_STR);
        $statement->bindValue(':city', $concert['city'], PDO::PARAM_STR);
        $statement->bindValue(':date', $concert['date'], PDO::PARAM_STR);
        $statement->bindValue(':schedule', $concert['schedule'], PDO::PARAM_STR);
        $statement->bindValue('artist_id', $concert['artist_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update concert in database
     */
    public function update(array $concert): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET place=:place, 
        city=:city,date=:date, schedule =:schedule, artist_id =:artist_id WHERE id=:id");
        $statement->bindValue('id', $concert['id'], PDO::PARAM_INT);
        $statement->bindValue(':place', $concert['place'], PDO::PARAM_STR);
        $statement->bindValue(':city', $concert['city'], PDO::PARAM_STR);
        $statement->bindValue(':date', $concert['date'], PDO::PARAM_STR);
        $statement->bindValue(':schedule', $concert['schedule'], PDO::PARAM_STR);
        $statement->bindValue('artist_id', $concert['artist_id'], PDO::PARAM_INT);
        return $statement->execute();
    }
}
