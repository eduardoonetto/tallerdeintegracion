<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/UserModel.php');
    require_once '../utils/RequestUtils.php';
    require_once('../config/config.php');

    class AuthController {
    private $config;
    private $User;

    public function __construct() {
        $this->User = new UserModel();
    }

    public function login($post) {
        $email      = $post['email'];
        $password   = $post['password'];
        $userData   = $this->User->login($email, $password);
        if($userData){
            //crear session:
            session_start();
            $_SESSION['usuario'] = $userData;
            header("Location: ../pages/dashboard");
        }else{
            header("Location: ../pages/sign-in?error=1");
        }
    }

    public function logout() {
        session_start();
        session_destroy();
        header("Location: ../pages/sign-in");
    }
}