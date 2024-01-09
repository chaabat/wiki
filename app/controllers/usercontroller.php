<?php

require_once(__DIR__ . '/../model/userModel.php');

// require_once('../services/implimentations/userImp.php');


class usercontroller
{

    public function Register()
    {
        $error = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
            $user = new UserModel();
            $role = 'auteur';
            $user->setName($_POST['name']);
            $user->setUsername($_POST['username']);
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $user->setPicture($_POST['picture']);
            $user->setRole($role);
            $error = $user->register();

            if (empty($error)) {
                header('Location: ../view/login.php');
                exit();
            }

            return $error;
        }
    }
    public function login()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['password']) && isset($_POST['email'])) {
            $user = new UserModel();
            $user->setEmail($_POST['email']);
            $user->setPassword($_POST['password']);
            $authenticatedUser = $user->login();

            if ($authenticatedUser) {
                session_start();
                $_SESSION['idUser'] = $authenticatedUser['idUser'];
                $_SESSION['name'] = $authenticatedUser['name'];
                $_SESSION['role'] = $authenticatedUser['role'];

                if ($_SESSION['role'] === 'admin') {
                    header('Location: ../view/dashboard.php');
                    exit();
                } elseif ($_SESSION['role'] === 'auteur') {
                    header('Location: ../view/home.php');
                    exit();
                }
            } else {
                return "Login failed. Invalid credentials.";
            }
        }
    }

    public function logout()
    {
        if (isset($_GET['deconn'])) {
            $user = new UserModel();
            return $user->logout();
        }
    }

    public function isLoggedIn($requiredRole = null)
    {
        session_start();

        if (!isset($_SESSION['idUser'])) {
            header("Location: login.php");
            exit();
        }

        if ($requiredRole !== null && $_SESSION['role'] !== $requiredRole) {
            header('Location: login.php');
            exit();
        }
    }
}
