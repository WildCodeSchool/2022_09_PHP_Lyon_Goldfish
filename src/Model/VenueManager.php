<?php

namespace App\Model;

use PDO;

class VenueManager extends AbstractManager
{
    public const TABLE = 'venue';
    private array $errors = [];


    public function getCheckErrors(): array
    {
        return $this->errors;
    }

    /**
     * Insert new venue in database
     */
    public function insert(array $venue): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`hall`, `city`, `image`) 
        VALUES (:hall, :city, :image)");
        $statement->bindValue(':hall', $venue['hall'], PDO::PARAM_STR);
        $statement->bindValue(':city', $venue['city'], PDO::PARAM_STR);
        $statement->bindValue(':image', $venue['image'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update artist in database
     */
    public function update(array $venue): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET hall=:hall, 
        city=:city, image=:image WHERE id=:id");
        $statement->bindValue('id', $venue['id'], PDO::PARAM_INT);
        $statement->bindValue(':hall', $venue['hall'], PDO::PARAM_STR);
        $statement->bindValue(':city', $venue['city'], PDO::PARAM_STR);
        $statement->bindValue(':image', $venue['image'], PDO::PARAM_STR);
        return $statement->execute();
    }

    public function venueFieldEmpty(array $venue): void
    {
        if (!isset($venue['hall']) || empty($venue['hall'])) {
            $this->errors[] = "La salle doit figurer";
        }

        if (!isset($venue['city']) || empty($venue['city'])) {
            $this->errors[] = "La ville doit figurer";
        }

        if (!isset($venue['image']) || empty($venue['image'])) {
            $this->errors[] = "Le lien d'image doit être renseigné";
        }
    }

    public function venueFieldLength(array $venue): void
    {
        if (strlen($venue['hall']) > 150) {
            $this->errors[] = "Le salle ne doit pas dépasser 150 caractères";
        }

        if (strlen($venue['city']) > 100) {
            $this->errors[] = "La ville ne doit pas dépasser 100 caractères";
        }

        if (strlen($venue['image']) > 255) {
            $this->errors[] = "Le lien de l'image ne doit pas dépasser 255 caractères";
        }
    }
}
