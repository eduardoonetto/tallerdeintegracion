<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/WorkerModel.php');
    require_once('../config/config.php');

    class WorkerController {
    private $config;
    private $Worker;

    public function __construct() {
        $this->Worker = new WorkerModel();
    }

    public function getTrabajadores() {
        
        $WorkersData = $this->Worker->obtenerTrabajadores();
        
        if($WorkersData){
            //crear session:
            return $WorkersData;
        }else{
            return [];
        }
    }

     public function newWorker($post){
         $campos_vacios = array(); // Almacenar campos vacíos
    
         // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
           if (empty($valor) and $clave != 'id') {
             $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
           }
        }
    
    //    if (!empty($campos_vacios)) {
    //        // Al menos un campo está vacío
    //         header("Location: ../pages/aseguradora?error=1&campos_vacios=". implode(", ", $campos_vacios));
    //    }

         $rut     = $post['rut'];
         $nombre  = $post['nombre'];
         $cargo   = $post['cargo'];


        $result = $this->Worker->insertarTrabajador($rut, $nombre,$cargo);
         if($result){
            header("Location: ../pages/trabajadores?success=1");
         }else{
            header("Location: ../pages/trabajadores?error=1");
        }
    }

    public function editWorker($post){

            $campos_vacios = array(); // Almacenar campos vacíos
        
            // Itera a través de $_POST para verificar todos los campos
            foreach ($post as $clave => $valor) {
                if (empty($valor) and $clave != 'id') {
                    $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
                }
            }
        
            // if (!empty($campos_vacios)) {
            //     // Al menos un campo está vacío
            //     header("Location: ../pages/usuarios?error=1&campos_vacios=". implode(", ", $campos_vacios));
            // }

            $id      = $post['id'];
            $rut     = $post['rut'];
            $nombre  = $post['nombre'];
            $cargo   = $post['cargo'];
    
            
    
            $result = $this->Worker->editarTrabajador($id, $rut, $nombre, $cargo);
            if($result){
                header("Location: ../pages/trabajadores?success=1");
            }else{
                header("Location: ../pages/trabajadores?error=1");
            }
        
    
    }

    public function deleteWorker($get){
        $id = $get['id'];
        $result = $this->Worker->eliminarTrabajador($id);
        if($result){
            header("Location: ../pages/trabajadores?success=1");
        }else{
            header("Location: ../pages/trabajadores?error=1");
        }
    }

    // public function edit_insurance($post){
    //     $campos_vacios = array(); // Almacenar campos vacíos
    
    //     // Itera a través de $_POST para verificar todos los campos
    //     foreach ($post as $clave => $valor) {
    //         if (empty($valor) and $clave != 'id') {
    //             $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
    //         }
    //     }
    
    //     if (!empty($campos_vacios)) {
    //         // Al menos un campo está vacío
    //         header("Location: ../pages/aseguradora?error=1&campos_vacios=". implode(", ", $campos_vacios));
    //     }

    //     $id             = $post['id'];
    //     $start_date     = $post['start_date'];
    //     $end_date       = $post['end_date'];
    //     $razon_social   = $post['razon_social'];
    //     $cobertura      = $post['cobertura'];

    //     $result = $this->Insurance->edit_insurance($id, $start_date, $end_date, $razon_social, $cobertura);
    //     if($result){
    //         header("Location: ../pages/aseguradora?success=1");
    //     }else{
    //         header("Location: ../pages/aseguradora?error=1");
    //     }
    // }

    // public function delete_insurance($get){
    //     $id = $get['id'];
    //     $result = $this->Insurance->delete_insurance($id);
    //     if($result){
    //         header("Location: ../pages/aseguradora?success=1");
    //     }else{
    //         header("Location: ../pages/aseguradora?error=1");
    //     }
    // }
}