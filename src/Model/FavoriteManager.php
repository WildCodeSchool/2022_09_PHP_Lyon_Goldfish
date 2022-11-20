<?php

namespace App\Model;

use PDO;

class FavoriteManager extends AbstractManager
{
    public function selectFavoritesArtists(): array
    {
        $query = "SELECT a.name_artist, a.style, a.image_artist, f.favorite_artist_id
        FROM artist a INNER JOIN favorite_artist f ON a.id=f.favorite_artist_id
        INNER JOIN user u ON u.id=f.user_id WHERE u.id = " . $_SESSION['user_id'];
        $statement = $this->pdo->query($query);
        $allFavoritesArtists = $statement->fetchAll();

        return $allFavoritesArtists;
    }

    public function selectFavoritesConcerts(): array
    {
        $query = "SELECT c.id, c.date, c.schedule, c.artist_id, c.venue_id,
        a.name_artist, a.style, a.image_artist, f.favorite_concert_id, v.name_venue, v.address, v.city, v.image_venue
        FROM concert c INNER JOIN artist a ON a.id=artist_id INNER JOIN venue v ON v.id=venue_id
        INNER JOIN favorite_concert f ON c.id=f.favorite_concert_id INNER JOIN user u ON u.id=f.user_id
        WHERE u.id = " . $_SESSION['user_id'] . "
        AND c.date >= CURDATE()
        ORDER BY c.date ASC";
        $statement = $this->pdo->query($query);
        $allFavoritesConcerts = $statement->fetchAll();

        return $allFavoritesConcerts;
    }

    public function selectConcertsForMyArtists(): array
    {
        $query = "SELECT c.id, c.date, c.schedule, c.artist_id, c.venue_id,
        a.name_artist, a.style, a.image_artist, fa.favorite_artist_id, v.name_venue, v.address, v.city, v.image_venue
        FROM concert c INNER JOIN artist a ON a.id=artist_id INNER JOIN venue v ON v.id=venue_id
        INNER JOIN favorite_artist fa ON a.id=fa.favorite_artist_id INNER JOIN user u ON u.id=fa.user_id
        WHERE u.id = " . $_SESSION['user_id'] . "
        AND c.artist_id=fa.favorite_artist_id
        AND c.date >= CURDATE()
        ORDER BY a.name_artist, c.date ASC";
        $statement = $this->pdo->query($query);
        $allFavoritesConcerts = $statement->fetchAll();

        return $allFavoritesConcerts;
    }

    public function insertFavoriteArtist(array $favoriteArtist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO favorite_artist (`user_id`, `favorite_artist_id`) 
        VALUES (:user_id, :favorite_artist_id)");
        $statement->bindValue(':user_id', $favoriteArtist['user_id'], PDO::PARAM_INT);
        $statement->bindValue(':favorite_artist_id', $favoriteArtist['favorite_artist_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function insertFavoriteConcert(array $favoriteConcert): int
    {
        $statement = $this->pdo->prepare("INSERT INTO favorite_concert (`user_id`, `favorite_concert_id`) 
        VALUES (:user_id, :favorite_concert_id)");
        $statement->bindValue(':user_id', $favoriteConcert['user_id'], PDO::PARAM_INT);
        $statement->bindValue(':favorite_concert_id', $favoriteConcert['favorite_concert_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function deleteFavoriteArtist(int $favoriteArtistId, int $userId): void
    {
        $statement = $this->pdo->prepare("DELETE FROM favorite_artist 
        WHERE user_id= :userId AND favorite_artist_id= :favorite_artist_id");
        $statement->bindValue(':favorite_artist_id', $favoriteArtistId, \PDO::PARAM_INT);
        $statement->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function deleteFavoriteConcert(int $favoriteConcertId, int $userId): void
    {
        $statement = $this->pdo->prepare("DELETE FROM favorite_concert 
        WHERE user_id= :userId AND favorite_concert_id= :favorite_concert_id");
        $statement->bindValue(':favorite_concert_id', $favoriteConcertId, \PDO::PARAM_INT);
        $statement->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $statement->execute();
    }
}
