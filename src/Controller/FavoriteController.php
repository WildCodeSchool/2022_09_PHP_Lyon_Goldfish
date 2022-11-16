<?php

namespace App\Controller;

use App\Model\ArtistManager;
use App\Model\ConcertManager;
use App\Model\FavoriteManager;

class FavoriteController extends AbstractController
{
    public function favoritesArtists(): string
    {
        $ArtistManager = new ArtistManager();
        $favorites = $ArtistManager->selectFavoritesArtists();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favorite_artist = array_map('trim', $_POST);
            $FavoriteManager = new FavoriteManager();
            $FavoriteManager->insert($favorite_artist);
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
