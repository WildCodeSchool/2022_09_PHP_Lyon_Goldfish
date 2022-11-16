<?php

namespace App\Controller;

use App\Model\ArtistManager;
use App\Model\ConcertManager;
use App\Model\FavoriteManager;

class FavoriteController extends AbstractController
{
    public function favoritesArtists(): string
    {
        $artistManager = new ArtistManager();
        $favorites = $artistManager->selectFavoritesArtists();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteArtist = array_map('trim', $_POST);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->insert($favoriteArtist);
        }

        return $this->twig->render('Artist/favorites.html.twig', ['favorites' => $favorites]);
    }

    public function agenda(): string
    {
        $favoritesManager = new ConcertManager();
        $favorites = $favoritesManager->selectFavoritesConcerts();

        return $this->twig->render('Agenda/index.html.twig', ['favorites' => $favorites]);
    }
}
