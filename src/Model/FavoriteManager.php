<?php

namespace App\Model;

use PDO;

class FavoriteManager extends AbstractManager
{
    public function insert(array $favoriteArtist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO favorite_artist (`user_id`, `favorite_artist_id`) 
        VALUES (:user_id, :favorite_artist_id)");
        $statement->bindValue(':user_id', $favoriteArtist['user_id'], PDO::PARAM_INT);
        $statement->bindValue(':favorite_artist_id', $favoriteArtist['favorite_artist_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
