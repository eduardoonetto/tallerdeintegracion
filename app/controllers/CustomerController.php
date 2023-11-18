<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/CustomerModel.php');
    require_once('../config/config.php');

    class CustomerController {
    private $config;
    private $Customer;

    public function __construct() {
        $this->Customer = new CustomerModel();
    }

    public function get_customers() {
        
        $customerData = $this->Customer->get_customers();
        
        if($customerData){
            //crear session:
            return $customerData;
        }else{
            return [];
        }
    }

    public function new_customer($post){
        $campos_vacios = array(); // Almacenar campos vacíos
    
        // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
            if (empty($valor) and $clave != 'id') {
                $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
            }
        }
    
        if (!empty($campos_vacios)) {
            // Al menos un campo está vacío
            header("Location: ../pages/inventario?error=1&campos_vacios=". implode(", ", $campos_vacios));
        }

        $nombre         = $post['nombre'];
        $rut            = $post['rut'];
        $email          = $post['email'];
        $telefono       = $post['telefono'];
        $direccion      = $post['direccion'];

        $result = $this->Customer->new_customer($nombre, $rut, $email, $telefono, $direccion);
        if($result){
            header("Location: ../pages/usuarios?success=1");
        }else{
            header("Location: ../pages/usuarios?error=1");
        }
    }

    public function edit_customer($post){
        $campos_vacios = array(); // Almacenar campos vacíos
    
        // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
            if (empty($valor) and $clave != 'id') {
                $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
            }
        }
    
        if (!empty($campos_vacios)) {
            // Al menos un campo está vacío
            header("Location: ../pages/usuarios?error=1&campos_vacios=". implode(", ", $campos_vacios));
        }
        
        $id             = $post['id'];
        $nombre         = $post['nombre'];
        $rut            = $post['rut'];
        $email          = $post['email'];
        $telefono       = $post['telefono'];
        $direccion      = $post['direccion'];

        

        $result = $this->Customer->edit_customer($id, $nombre, $rut, $email, $telefono, $direccion);
        if($result){
            header("Location: ../pages/usuarios?success=1");
        }else{
            header("Location: ../pages/usuarios?error=1");
        }
    }

    public function delete_customer($get){
        $id = $get['id'];
        $result = $this->Customer->delete_customer($id);
        if($result){
            header("Location: ../pages/usuarios?success=1");
        }else{
            header("Location: ../pages/usuarios?error=1");
        }
    }
}