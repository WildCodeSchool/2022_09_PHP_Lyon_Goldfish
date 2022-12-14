<?php

namespace App\Controller;

use App\Model\UserManager;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\Intl\IntlExtension;

abstract class AbstractController
{
    protected Environment $twig;
    protected array|false $user;
    /**
     *  Initializes this class.
     */
    public function __construct()
    {
        $loader = new FilesystemLoader(APP_VIEW_PATH);
        $this->twig = new Environment(
            $loader,
            [
                'debug' => true,
                'cache' => false,
            ]
        );
        $this->twig->addExtension(new DebugExtension());
        $this->twig->addExtension(new IntlExtension());

        $userManager = new UserManager();

        $this->user = isset($_SESSION['user_id']) ? $userManager->selectOneById($_SESSION['user_id']) : false;
        if ($this->user != false) {
            $favoritesArtist = $userManager->addFavoriteIdArtistInUser($this->user['id']);
            $this->user['favorites_artist'] = array_column($favoritesArtist, 'favorite_artist_id');

            $favoritesConcert = $userManager->addFavoriteIdConcertInUser($this->user['id']);
            $this->user['favorites_concert'] = array_column($favoritesConcert, 'favorite_concert_id');
        }

        $this->twig->addGlobal('user', $this->user);
    }
}
