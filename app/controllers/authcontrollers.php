<?php

require_once '../app/models/user.php';
require_once '../app/core/controller.php';

class AuthController extends Controller {
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userModel = new User();
            $user = $userModel->login($_POST['username'], $_POST['password']);

            if ($user) {
                session_start();
                $_SESSION['user'] = $user;
                header("Location: index.php?page=dashboard");
                exit;
            }
        }
        $this->view('auth/login');
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: index.php");
    }
}
