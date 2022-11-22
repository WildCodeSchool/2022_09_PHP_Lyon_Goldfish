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
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " 
        (`name_venue`, `address`, `city`, `image_venue`) 
        VALUES (:name_venue, :address, :city, :image_venue)");
        $statement->bindValue(':name_venue', $venue['name_venue'], PDO::PARAM_STR);
        $statement->bindValue(':address', $venue['address'], PDO::PARAM_STR);
        $statement->bindValue(':city', $venue['city'], PDO::PARAM_STR);
        $statement->bindValue(':image_venue', $venue['image_venue'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update venue in database
     */
    public function update(array $venue): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name_venue=:name_venue, 
        address=:address, city=:city, image_venue=:image_venue WHERE id=:id");
        $statement->bindValue(':id', $venue['id'], PDO::PARAM_INT);
        $statement->bindValue(':name_venue', $venue['name_venue'], PDO::PARAM_STR);
        $statement->bindValue(':address', $venue['address'], PDO::PARAM_INT);
        $statement->bindValue(':city', $venue['city'], PDO::PARAM_STR);
        $statement->bindValue(':image_venue', $venue['image_venue'], PDO::PARAM_STR);
        return $statement->execute();
    }

    public function venueFieldEmpty(array $venue): void
    {
        if (!isset($venue['name_venue']) || empty($venue['name_venue'])) {
            $this->errors[] = "La salle doit figurer";
        }

        if (!isset($venue['city']) || empty($venue['city'])) {
            $this->errors[] = "La ville doit figurer";
        }

        if (!isset($venue['image_venue']) || empty($venue['image_venue'])) {
            $this->errors[] = "Le lien d'image doit être renseigné";
        }
    }

    public function venueFieldLength(array $venue): void
    {
        if (strlen($venue['name_venue']) > 150) {
            $this->errors[] = "Le salle ne doit pas dépasser 150 caractères";
        }

        if (strlen($venue['city']) > 100) {
            $this->errors[] = "La ville ne doit pas dépasser 100 caractères";
        }

        if (strlen($venue['image_venue']) > 255) {
            $this->errors[] = "Le lien de l'image ne doit pas dépasser 255 caractères";
        }
    }
}
