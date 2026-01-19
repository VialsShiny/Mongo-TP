<?php

namespace App\Controllers;

use App\EntityManager;
use App\Models\Author;
use App\Validator;

class AuthorController extends Controller
{
    private $em;

    public function __construct()
    {
        parent::__construct();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $this->em = new EntityManager();
    }

    public function login()
    {
        if (!empty($_SESSION['user'])) {
            header('Location: /');
            exit;
        }

        if (empty($_POST)) {
            return $this->render('auth/login.html.twig');
        }

        $validator = new Validator();
        $userClass = $validator->validate($_POST, Author::class);
        $errors = $userClass->getErrors();

        $authError = 'Email ou mot de passe incorrect';
        $userMatch = null;

        if (!empty($_POST['email']) && empty($errors['email'])) {
            $userMatch = $this->em->findById('users', $_POST['email'], 'email');

            if (!$userMatch) {
                $userClass->setError('email', $authError);
            }
        }

        if ($userMatch && empty($errors['password'])) {
            if (!password_verify($_POST['password'], $userMatch['password'])) {
                $userClass->setError('password', $authError);
            }
        }

        if ($userMatch && empty($userClass->getErrors())) {

            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id'    => (string) $userMatch['_id'],
                'email' => $userMatch['email'],
                'role'  => $userMatch['role'] ?? 'user'
            ];

            header('Location: /');
            exit;
        }

        return $this->render('auth/login.html.twig', [
            'data'   => $_POST,
            'errors' => $userClass->getErrors(),
        ]);
    }

    public function register()
    {
        if (!empty($_SESSION['user'])) {
            header('Location: /');
            exit;
        }

        if (empty($_POST)) {
            return $this->render('auth/register.html.twig');
        }

        $validator = new Validator();
        $userClass = $validator->validate($_POST, Author::class);
        $errors = $userClass->getErrors();
        $authError = 'Email déjà utilisé';

        if (empty($errors)) {
            $data = $userClass->getAllData();
            $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);

            $insertedUser = $this->em->insertOne('users', $data, 'email');

            if (!$insertedUser) {
                $userClass->setError('email', $authError);
            }
        }

        if (!empty($insertedUser) && empty($userClass->getErrors())) {

            session_regenerate_id(true);

            $_SESSION['user'] = [
                'id'    => (string) $insertedUser['_id'],
                'email' => $insertedUser['email'],
                'role'  => $insertedUser['role'] ?? 'user'
            ];

            header('Location: /');
            exit;
        }

        return $this->render('auth/register.html.twig', [
            'data'   => $_POST,
            'errors' => $userClass->getErrors(),
        ]);
    }

    public function logout()
    {
        session_start();
        $_SESSION = [];
        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }
        session_destroy();
        header('Location: /login');
        exit;
    }
}
