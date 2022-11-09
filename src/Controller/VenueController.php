<?php

namespace App\Controller;

use App\Model\VenueManager;

class VenueController extends AbstractController
{
    /**
     * List items
     */
    public function index(): string
    {
        $venueManager = new VenueManager();
        $venues = $venueManager->selectAll();

        return $this->twig->render('Venue/index.html.twig', ['venues' => $venues]);
    }

    /**
     * Show informations for a specific item
     */
    public function show(int $id): string
    {
        $venueManager = new VenueManager();
        $venue = $venueManager->selectOneById($id);

        return $this->twig->render('Venue/show.html.twig', ['venue' => $venue]);
    }

    /**
     * Edit a specific item
     */
    public function edit(int $id): ?string
    {
        $venueManager = new VenueManager();
        $venue = $venueManager->selectOneById($id);
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $venue = array_map('trim', $_POST);
            $venueManager->venueFieldEmpty($venue);

            $errors = $venueManager->getCheckErrors();
            if (empty($errors)) {
                $venueManager = new VenueManager();
                $venueManager->update($venue);

                header('Location: /venues/show?id=' . $id);
            }
        }
        return $this->twig->render('Venue/edit.html.twig', [
            'venue' => $venue, 'errors' => $errors
        ]);
    }

    /**
     * Add a new item
     */
    public function add(): ?string
    {
        $venueManager = new VenueManager();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $venue = array_map('trim', $_POST);
            $venueManager->venueFieldEmpty($venue);

            $errors = $venueManager->getCheckErrors();
            if (empty($errors)) {
                $venueManager = new VenueManager();
                $id = $venueManager->insert($venue);

                header('Location: /venues/show?id=' . $id);
            }
        }
        return $this->twig->render('Venue/add.html.twig', array('errors' => $errors));
    }

    /**
     * Delete a specific item
     */
    public function delete(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = trim($_POST['id']);
            $venueManager = new VenueManager();
            $venueManager->delete((int)$id);

            header('Location:/venues');
        }
    }
}
