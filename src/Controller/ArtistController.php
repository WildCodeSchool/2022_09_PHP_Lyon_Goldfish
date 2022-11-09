<?php

namespace App\Controller;

use App\Model\ArtistManager;
use PDOException;

class ArtistController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $artistManager = new ArtistManager();
        $artists = $artistManager->selectAll();

        return $this->twig->render('Artist/index.html.twig', ['artists' => $artists]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $artistManager = new ArtistManager();
        $artist = $artistManager->selectOneById($id);

        return $this->twig->render('Artist/show.html.twig', ['artist' => $artist]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $artistManager = new ArtistManager();
        $artist = $artistManager->selectOneById($id);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $artist = array_map('trim', $_POST);
            $artistManager->artistFieldEmpty($artist);

            $errors = $artistManager->getCheckErrors();
            if (empty($errors)) {
                $artistManager = new ArtistManager();
                $artistManager->update($artist);

                header('Location: /artists/show?id=' . $id);
            }
        }
        return $this->twig->render('Artist/edit.html.twig', [
            'artist' => $artist, 'errors' => $errors
        ]);
    }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        $messageError = null;

        $artistManager = new ArtistManager();
        $errors = [];

        try {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // clean $_POST data
                $artist = array_map('trim', $_POST);
                $artistManager->artistFieldEmpty($artist);

                $errors = $artistManager->getCheckErrors();
                if (empty($errors)) {
                    $artistManager = new ArtistManager();
                    $id = $artistManager->insert($artist);

                    header('Location: /artists/show?id=' . $id);
                    return $this->twig->render('Artist/add.html.twig', array('errors' => $errors));
                }
            }
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $messageError = "Impossible de rentrer un artiste qui existe déjà";
            } else {
                $messageError = $e->getMessage();
            }
        }
        return $this->twig->render('Artist/add.html.twig', ['messageError' => $messageError,]);
    }



    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $artistManager = new ArtistManager();
            $artistManager->delete((int)$id);

            header('Location:/artists');
        }
    }

    public function search(): string
    {
        $artistManager = new ArtistManager();
        $artists = $artistManager->selectRandomArtists();

        return $this->twig->render('Artist/search.html.twig', ['artists' => $artists]);
    }
}
