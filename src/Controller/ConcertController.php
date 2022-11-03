<?php

namespace App\Controller;

use App\Model\ConcertManager;

class ConcertController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $concertManager = new ConcertManager();
        $allTables = $concertManager->selectAllConcerts();

        return $this->twig->render('Concert/index.html.twig', ['concerts' => $allTables]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $concertManager = new ConcertManager();
        $concert = $concertManager->selectOneConcertById($id);

        return $this->twig->render('Concert/show.html.twig', ['concert' => $concert]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $concertManager = new ConcertManager();
        $concert = $concertManager->selectOneConcertById($id);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $concert = array_map('trim', $_POST);
            $errors = [];

            if (!isset($concert['place']) || empty($concert['place'])) {
                $errors[] = "La doit figurer";
            }

            if (!isset($concert['city']) || empty($concert['city'])) {
                $errors[] = "La ville doit figurer";
            }

            if (!isset($concert['date']) || empty($concert['date'])) {
                $errors[] = "La date doit figurer";
            }

            if (count($errors) === 0) {
                $concertManager->update($concert);

                header('Location: /concerts/show?id=' . $id);
            }
            return null;
        }
        return $this->twig->render('Concert/edit.html.twig', [
            'concert' => $concert,
        ]);
    }
    /**
     * Add a new item
     */
    public function add(): ?string
    {
        $concertManager = new ConcertManager();
        $errors = [];
        $allArtists = $concertManager->selectAllArtists();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $concert = array_map('trim', $_POST);
            $concertManager->concertLocationFieldEmpty($concert);
            $concertManager->concertLocationFieldLength($concert);
            $concertManager->concertTimeFieldEmpty($concert);

            $errors = $concertManager->getCheckErrors();
            if (empty($concertManager->getCheckErrors())) {
                $concertManager = new ConcertManager();
                $id = $concertManager->insert($concert);

                header('Location: /concerts/show?id=' . $id);
            }
            return null;
        }
        return $this->twig->render('Concert/add.html.twig', ['artists' => $allArtists, 'errors' => $errors]);
    }

    /**
     * Delete a specific item
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
