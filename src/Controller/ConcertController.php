<?php

namespace App\Controller;

use App\Model\ConcertManager;
use App\Model\FavoriteManager;

class ConcertController extends AbstractController
{
    /**
     * List concert
     */
    public function index(): string
    {
        $concertManager = new ConcertManager();
        $allConcerts = $concertManager->selectAllConcerts();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $favoriteConcert = array_map('trim', $_POST);
            $favoriteManager = new FavoriteManager();
            $favoriteManager->insertFavoriteConcert($favoriteConcert);

            header('Location: /concerts');
        }

        return $this->twig->render('Concert/index.html.twig', ['concerts' => $allConcerts]);
    }

    /**
     * Show informations for a specific concert
     */
    public function show(int $id): string
    {
        $concertManager = new ConcertManager();
        $concert = $concertManager->selectOneConcertById($id);

        return $this->twig->render('Concert/show.html.twig', ['concert' => $concert]);
    }

    /**
     * Edit a specific concert
     */
    public function edit(int $id): ?string
    {
        $concertManager = new ConcertManager();
        $errors = [];
        $concert = $concertManager->selectOneConcertById($id);
        $allArtists = $concertManager->selectAllArtists();
        $allVenues = $concertManager->selectAllVenues();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $concert = array_map('trim', $_POST);
            $concertManager->concertLocationArtistFieldEmpty($concert);
            $concertManager->concertTimeFieldEmpty($concert);

            $errors = $concertManager->getCheckErrors();
            if (empty($errors)) {
                $concertManager = new ConcertManager();
                $concertManager->update($concert);

                header('Location: /concerts/show?id=' . $id);
            }
        }
        return $this->twig->render('Concert/edit.html.twig', [
            'concert' => $concert,
            'artists' => $allArtists, 'venues' => $allVenues, 'errors' => $errors
        ]);
    }
    /**
     * Add a new concert
     */
    public function add(): ?string
    {
        $concertManager = new ConcertManager();
        $errors = [];
        $allArtists = $concertManager->selectAllArtists();
        $allVenues = $concertManager->selectAllVenues();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $concert = array_map('trim', $_POST);
            $concertManager->concertLocationArtistFieldEmpty($concert);
            $concertManager->concertTimeFieldEmpty($concert);
            $concertManager->prohibitPastConcertDate($concert);

            $errors = $concertManager->getCheckErrors();
            if (empty($errors)) {
                $concertManager = new ConcertManager();
                $id = $concertManager->insert($concert);

                header('Location: /concerts/show?id=' . $id);
            }
        }
        return $this->twig->render('Concert/add.html.twig', [
            'artists' => $allArtists,
            'venues' => $allVenues, 'errors' => $errors
        ]);
    }

    /**
     * Delete a specific concert
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $concertManager = new ConcertManager();
            $concertManager->delete((int)$id);

            header('Location:/concerts');
        }
    }
}
