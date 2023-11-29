<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/UserModel.php');
    require_once('../config/config.php');

    class UserController {
    private $config;
    private $User;

    public function __construct() {
        $this->User = new UserModel();
    }

    public function get_users() {
        
        $userData = $this->User->get_users();
        
        if($userData){
            return $userData;
        }else{
            return [];
        }
    }

    public function get_mecanicos() {
        
        $userData = $this->User->get_mecanicos();
        
        if($userData){
            return $userData;
        }else{
            return [];
        }
    }
}