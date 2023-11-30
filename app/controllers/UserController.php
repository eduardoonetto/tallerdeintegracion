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

    public function new_user($data) {
        $name = $data['name'];
        $email = $data['email'];
        $password = $data['password'];
        $role = $data['role'];
        $change_password = 0;

        //Insertar usuario y retonar el id:
        $user_id = $this->User->new_user($name, $email, $password, $change_password);
        if($user_id){
            //Insertar rol:
            $this->User->new_user_role($user_id, $role);
            header('Location: ../pages/usuarios.php');
        }
    }

    public function get_users() {
        
        $userData = $this->User->get_users();
        
        if($userData){
            return $userData;
        }else{
            return [];
        }
    }

    public function get_users_with_role() {
        
        $userData = $this->User->get_users_with_role();
        
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

    public function delete_user($id){
        $this->User->delete_user($id);
        header('Location: ../pages/usuarios.php');
    }
}