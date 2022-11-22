<?php

namespace App\Controller;

use App\Model\FavoriteManager;
use App\Model\ConcertManager;

class FavoriteController extends AbstractController
{
    public function favoritesArtists(): string
    {
        $artistManager = new FavoriteManager();
        $favorites = $artistManager->selectFavoritesArtists();

        return $this->twig->render('Artist/favorites.html.twig', ['favorites' => $favorites]);
    }

    public function favoritesConcerts(): string
    {
        $concertManager = new FavoriteManager();
        $favorites = $concertManager->selectFavoritesConcerts();

        return $this->twig->render('Concert/favorites.html.twig', ['favorites' => $favorites]);
    }

    public function concertsForMyArtists(): string
    {
        $concertManager = new FavoriteManager();
        $favorites = $concertManager->selectConcertsForMyArtists();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteArtist = array_map('trim', $_POST);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->insertFavoriteConcert($favoriteArtist);

            header('Location: /concerts/myArtists');
        }

        return $this->twig->render('Concert/myArtists.html.twig', ['favorites' => $favorites]);
    }

    public function agenda(): string
    {
        if ($this->user != false) {
            $favoritesManager = new FavoriteManager();
            $favorites = $favoritesManager->selectFavoritesConcerts();

            return $this->twig->render('Agenda/index.html.twig', ['favorites' => $favorites]);
        } else {
            return $this->twig->render('Agenda/index.html.twig');
        }
    }

    public function deleteFavoriteArtist(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteArtistId = trim($_POST['favorite_artist_id']);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->deleteFavoriteArtist((int)$favoriteArtistId, $_SESSION['user_id']);

            header('Location:/artists/favorites');
        }
    }

    public function deleteFavoriteConcert(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteConcertId = trim($_POST['favorite_concert_id']);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->deleteFavoriteConcert((int)$favoriteConcertId, $_SESSION['user_id']);

            header('Location:/concerts/favorites');
        }
    }

    public function deleteFavoriteConcertMyArtists(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteConcertId = trim($_POST['favorite_concert_id']);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->deleteFavoriteConcert((int)$favoriteConcertId, $_SESSION['user_id']);

            header('Location:/concerts/myArtists');
        }
    }
}
