<?php

namespace App\Model;

use PDO;

class ArtistManager extends AbstractManager
{
    public const TABLE = 'artist';
    private array $errors = [];


    public function getCheckErrors(): array
    {
        return $this->errors;
    }

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

    public function artistFieldEmpty(array $artist): void
    {
        if (!isset($artist['name']) || empty($artist['name'])) {
            $this->errors[] = "Le nom doit figurer";
        }

        if (!isset($artist['style']) || empty($artist['style'])) {
            $this->errors[] = "Le style doit figurer";
        }

        if (!isset($artist['image']) || empty($artist['image'])) {
            $this->errors[] = "L'image doit être renseignée";
        }
    }

    public function artistFieldLength(array $artist): void
    {
        if (strlen($artist['name']) > 100) {
            $this->errors[] = "Le nom ne doit pas dépasser 100 caractères";
        }

        if (strlen($artist['style']) > 50) {
            $this->errors[] = "Le style ne doit pas dépasser 50 caractères";
        }

        if (strlen($artist['image']) > 255) {
            $this->errors[] = "Le lien de l'image ne doit pas dépasser 255 caractères";
        }
    }
}
