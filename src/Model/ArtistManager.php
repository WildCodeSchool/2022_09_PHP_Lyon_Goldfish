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
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name_artist`, `style`, `image_artist`) 
        VALUES (:name_artist, :style, :image_artist)");
        $statement->bindValue(':name_artist', $artist['name_artist'], PDO::PARAM_STR);
        $statement->bindValue(':style', $artist['style'], PDO::PARAM_STR);
        $statement->bindValue(':image_artist', $artist['image_artist'], PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }

    /**
     * Update artist in database
     */
    public function update(array $artist): bool
    {
        $statement = $this->pdo->prepare("UPDATE " . self::TABLE . " SET name_artist=:name_artist, 
        style=:style, image_artist=:image_artist WHERE id=:id");
        $statement->bindValue(':id', $artist['id'], PDO::PARAM_INT);
        $statement->bindValue(':name_artist', $artist['name_artist'], PDO::PARAM_STR);
        $statement->bindValue(':style', $artist['style'], PDO::PARAM_STR);
        $statement->bindValue(':image_artist', $artist['image_artist'], PDO::PARAM_STR);
        return $statement->execute();
    }

    public function selectRandomArtists(): array
    {
        $query = "SELECT name_artist, style, image_artist FROM " . static::TABLE . " ORDER BY RAND() LIMIT 4";
        $statement = $this->pdo->query($query);
        $randomArtists = $statement->fetchAll();

        return $randomArtists;
    }

    public function selectFavoritesArtists(): array
    {
        $query = "SELECT a.name_artist, a.style, a.image_artist
        FROM " . static::TABLE . " a INNER JOIN favorite_artist f ON a.id=f.favorite_artist_id
        INNER JOIN user u ON u.id=f.user_id WHERE u.id = " . $_SESSION['user_id'];
        $statement = $this->pdo->query($query);
        $allFavoritesArtists = $statement->fetchAll();

        return $allFavoritesArtists;
    }

    public function artistFieldEmpty(array $artist): void
    {
        if (!isset($artist['name_artist']) || empty($artist['name_artist'])) {
            $this->errors[] = "Le nom doit figurer";
        }

        if (!isset($artist['style']) || empty($artist['style'])) {
            $this->errors[] = "Le style doit figurer";
        }

        if (!isset($artist['image_artist']) || empty($artist['image_artist'])) {
            $this->errors[] = "L'image doit être renseignée";
        }
    }

    public function artistFieldLength(array $artist): void
    {
        if (strlen($artist['name_artist']) > 100) {
            $this->errors[] = "Le nom ne doit pas dépasser 100 caractères";
        }

        if (strlen($artist['style']) > 50) {
            $this->errors[] = "Le style ne doit pas dépasser 50 caractères";
        }

        if (strlen($artist['image_artist']) > 255) {
            $this->errors[] = "Le lien de l'image ne doit pas dépasser 255 caractères";
        }
    }
}
