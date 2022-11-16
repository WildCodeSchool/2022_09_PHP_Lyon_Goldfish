<?php

namespace App\Model;

use PDO;

class FavoriteManager extends AbstractManager
{
    public function insert(array $artist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO favorite_artist (`user_id`, `favorite_artist_id`) 
        VALUES (:user_id, :favorite_artist_id)");
        $statement->bindValue(':user_id', $artist['user_id'], PDO::PARAM_INT);
        $statement->bindValue(':favorite_artist_id', $artist['favorite_artist_id'], PDO::PARAM_INT);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
