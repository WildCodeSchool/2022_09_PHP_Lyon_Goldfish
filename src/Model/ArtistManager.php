<?php

namespace App\Model;

use PDO;

class ArtistManager extends AbstractManager
{
    public const TABLE = 'artist';

    /**
     * Insert new artist in database
     */
    public function insert(array $artist): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `style`, `image`) 
        VALUES (:name, :style, :image)");
        $statement->bindValue(':name', $artist['name'], PDO::PARAM_STR);
        $statement->bindValue(':style', $artist['style'], PDO::PARAM_STR);
        $statement->bindValue(':image', $artist['image'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update artist in database
     */
    public function update(array $artist): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name=:name, 
        style=:style, image=:image WHERE id=:id");
        $statement->bindValue('id', $artist['id'], PDO::PARAM_INT);
        $statement->bindValue(':name', $artist['name'], PDO::PARAM_STR);
        $statement->bindValue(':style', $artist['style'], PDO::PARAM_STR);
        $statement->bindValue(':image', $artist['image'], PDO::PARAM_STR);
        return $statement->execute();
    }
}
