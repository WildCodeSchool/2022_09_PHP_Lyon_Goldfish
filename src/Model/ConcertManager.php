<?php

namespace App\Model;

use PDO;

class ConcertManager extends AbstractManager
{
    public const TABLE = 'concert';
    private array $errors = [];


    public function getCheckErrors(): array
    {
        return $this->errors;
    }
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

    public function concertLocationFieldEmpty(array $concert): void
    {
        if (!isset($concert['place']) || empty($concert['place'])) {
            $this->errors[] = "La salle doit figurer";
        }

        if (!isset($concert['city']) || empty($concert['city'])) {
            $this->errors[] = "La ville doit figurer";
        }

        if (!isset($concert['artist_id']) || empty($concert['artist_id'])) {
            $this->errors[] = "L'artiste doit être renseigné";
        }
    }

    public function concertLocationFieldLength(array $concert): void
    {
        if (strlen($concert['place']) > 150) {
            $this->errors[] = "Le nom ne doit pas dépasser 100 caractères";
        }

        if (strlen($concert['city']) > 100) {
            $this->errors[] = "Le style ne doit pas dépasser 50 caractères";
        }
    }

    public function concertTimeFieldEmpty(array $concert): void
    {
        if (!isset($concert['date']) || empty($concert['date'])) {
            $this->errors[] = "La date doit figurer";
        }

        if (!isset($concert['schedule']) || empty($concert['schedule'])) {
            $this->errors[] = "L'heure doit figurer";
        }
    }
}
