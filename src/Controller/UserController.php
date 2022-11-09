<?php

namespace App\Controller;

use App\Model\UserManager;

class UserController extends AbstractController
{
    public function login(): string
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $credentials = array_map('trim', $_POST);
            //      @todo make some controls on email and password fields and if errors, send them to the view
            $userManager = new UserManager();
            $user = $userManager->selectOneByEmail($credentials['email']);
            if ($user && password_verify($credentials['password'], $user['password'])) {
                $_SESSION['user_id'] = $user['id'];
                header('Location: /');
                exit();
            }
        }

        return $this->twig->render('User/login.html.twig');
    }
    public function logout()
    {
        unset($_SESSION['user_id']);
        header('Location: /');
    }
    public function register(): string
    {
        return $this->twig->render('User/register.html.twig');
    }
}
