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

    public function selectAllConcerts(): array
    {
        $query = "SELECT c.id, c.place, c.city, c.date, c.schedule, c.artist_id, a.name, a.style, a.image 
        FROM " . static::TABLE . " c INNER JOIN artist a ON a.id=artist_id";
        $statement = $this->pdo->query($query);
        $allConcerts = $statement->fetchAll();

        return $allConcerts;
    }

    public function selectOneConcertById(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT c.id, c.place, c.city, c.date, c.schedule, c.artist_id, a.name, 
        a.style, a.image FROM " . static::TABLE . " c INNER JOIN artist a ON a.id=artist_id WHERE c.id=:id");
        $statement->bindValue('id', $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetch();
    }

    public function selectAllArtists(): array
    {
        $query = "SELECT * FROM artist";
        $statement = $this->pdo->query($query);
        $allArtists = $statement->fetchAll();

        return $allArtists;
    }
}
