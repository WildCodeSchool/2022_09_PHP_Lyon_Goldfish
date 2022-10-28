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
        $concerts = $concertManager->selectAll();

        return $this->twig->render('Concert/index.html.twig', ['concerts' => $concerts]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $concertManager = new ConcertManager();
        $concert = $concertManager->selectOneById($id);

        return $this->twig->render('Concert/show.html.twig', ['concert' => $concert]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $concertManager = new ConcertManager();
        $concert = $concertManager->selectOneById($id);

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
                $concertManager = new ConcertManager();
                $id = $concertManager->insert($concert);

                header('Location: /concerts/show?id=' . $id);
            }
            return null;
        }
        return $this->twig->render('Concert/add.html.twig');
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
