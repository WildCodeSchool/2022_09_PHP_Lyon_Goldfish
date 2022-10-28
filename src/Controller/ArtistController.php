<?php

namespace App\Controller;

use App\Model\ArtistManager;

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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $artist = array_map('trim', $_POST);
            $errors = [];

            if (!isset($artist['name']) || empty($artist['name'])) {
                $errors[] = "Le nom doit figurer";
            }

            if (!isset($artist['style']) || empty($artist['style'])) {
                $errors[] = "Le style doit figurer";
            }

            if (!isset($artist['image']) || empty($artist['image'])) {
                $errors[] = "L'image doit être renseignée";
            }

            if (count($errors) === 0) {
                $artistManager->update($artist);

                header('Location: /artists/show?id=' . $id);
            }
            return null;
        }
        return $this->twig->render('Artist/edit.html.twig', [
            'artist' => $artist,
        ]);
    }
    // TODO validations (length, format...)

    // if validation is ok, update and redirection


    /**
     * Add a new item
     */
    public function add(): ?string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $artist = array_map('trim', $_POST);
            $errors = [];

            if (!isset($artist['name']) || empty($artist['name'])) {
                $errors[] = "Le nom doit figurer";
            }

            if (!isset($artist['style']) || empty($artist['style'])) {
                $errors[] = "Le style doit figurer";
            }

            if (!isset($artist['image']) || empty($artist['image'])) {
                $errors[] = "L'image doit être renseignée";
            }

            if (count($errors) === 0) {
                $artistManager = new ArtistManager();
                $id = $artistManager->insert($artist);

                header('Location: /artists/show?id=' . $id);
            }
            return null;
        }
        return $this->twig->render('Artist/add.html.twig');
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
        $artists = $artistManager->selectAll();

        return $this->twig->render('Artist/search.html.twig', ['artists' => $artists]);
    }
}
