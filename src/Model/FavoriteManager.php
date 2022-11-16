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

    public function insert(array $favoriteArtist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO favorite_artist (`user_id`, `favorite_artist_id`) 
        VALUES (:user_id, :favorite_artist_id)");
        $statement->bindValue(':user_id', $favoriteArtist['user_id'], PDO::PARAM_INT);
        $statement->bindValue(':favorite_artist_id', $favoriteArtist['favorite_artist_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    public function deleteFavorite(int $favorite_artist_id, int $userId): void
    {
        // prepared request
        $statement = $this->pdo->prepare("DELETE FROM favorite_artist 
        WHERE user_id= :userId AND favorite_artist_id= :favorite_artist_id");
        $statement->bindValue(':favorite_artist_id', $favorite_artist_id, \PDO::PARAM_INT);
        $statement->bindValue(':userId', $userId, \PDO::PARAM_INT);
        $statement->execute();
    }
}
