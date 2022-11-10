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
            " (`date`, `schedule`, `artist_id`, `venue_id`) VALUES (:date, :schedule, :artist_id, :venue_id)");
        $statement->bindValue(':date', $concert['date'], PDO::PARAM_STR);
        $statement->bindValue(':schedule', $concert['schedule'], PDO::PARAM_STR);
        $statement->bindValue('artist_id', $concert['artist_id'], PDO::PARAM_INT);
        $statement->bindValue('venue_id', $concert['venue_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function update(array $concert): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET date=:date, schedule =:schedule, 
        artist_id =:artist_id, venue_id =:venue_id WHERE id=:id");
        $statement->bindValue('id', $concert['id'], PDO::PARAM_INT);
        $statement->bindValue(':date', $concert['date'], PDO::PARAM_STR);
        $statement->bindValue(':schedule', $concert['schedule'], PDO::PARAM_STR);
        $statement->bindValue('artist_id', $concert['artist_id'], PDO::PARAM_INT);
        $statement->bindValue('venue_id', $concert['venue_id'], PDO::PARAM_INT);
        return $statement->execute();
    }

    public function selectAllConcerts(): array
    {
        $query = "SELECT c.id, c.date, c.schedule, c.artist_id, c.venue_id, 
        a.name_artist, a.style, a.image_artist, v.name_venue, v.city, v.image_venue 
        FROM " . static::TABLE . " c INNER JOIN artist a ON a.id=artist_id 
        INNER JOIN venue v ON v.id=venue_id ORDER BY date ASC";
        $statement = $this->pdo->query($query);
        $allConcerts = $statement->fetchAll();

        return $allConcerts;
    }

    public function selectOneConcertById(int $id): array|false
    {
        $statement = $this->pdo->prepare("SELECT 
        c.id, c.date, c.schedule, c.artist_id, c.venue_id, 
        a.name_artist, a.style, a.image_artist, v.name_venue, v.city, v.image_venue 
        FROM " . static::TABLE . " c INNER JOIN artist a ON a.id=artist_id INNER JOIN venue v ON v.id=venue_id 
        WHERE c.id=:id");
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

    public function selectAllVenues(): array
    {
        $query = "SELECT * FROM venue";
        $statement = $this->pdo->query($query);
        $allVenues = $statement->fetchAll();

        return $allVenues;
    }

    public function concertLocationArtistFieldEmpty(array $concert): void
    {
        if (!isset($concert['venue_id']) || empty($concert['venue_id'])) {
            $this->errors[] = "La salle doit figurer";
        }

        if (!isset($concert['artist_id']) || empty($concert['artist_id'])) {
            $this->errors[] = "L'artiste doit être renseigné";
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
