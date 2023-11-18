<?php
// Path: app/controllers/auth.php
// Compare this snippet from app/pages/sign-in.php:
    require_once('../models/InventoryModel.php');
    require_once('../config/config.php');

    class InventoryController {
    private $config;
    private $Inventory;

    public function __construct() {
        $this->Inventory = new InventoryModel();
    }

    public function get_inventories() {
        
        $inventoryData = $this->Inventory->get_inventories();
        
        if($inventoryData){
            //crear session:
            return $inventoryData;
        }else{
            return [];
        }
    }

    public function new_inventory($post){
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

        $item           = $post['item'];
        $categoria      = $post['categoria'];
        $cantidad       = $post['cantidad'];
        $valor          = $post['valor'];
        $umbral         = $post['umbral'];

        $result = $this->Inventory->new_inventory($item, $categoria, $cantidad, $valor, $umbral);
        if($result){
            header("Location: ../pages/inventario?success=1");
        }else{
            header("Location: ../pages/inventario?error=1");
        }
    }

    public function edit_inventory($post){
        $campos_vacios = array(); // Almacenar campos vacíos
    
        // Itera a través de $_POST para verificar todos los campos
        foreach ($post as $clave => $valor) {
            if (empty($valor) and $clave != 'id') {
                $campos_vacios[] = $clave; // Agrega los nombres de los campos vacíos
            }
        }
    
        if (!empty($campos_vacios)) {
            // Al menos un campo está vacío
            header("Location: ../pages/aseguradora?error=1&campos_vacios=". implode(", ", $campos_vacios));
        }

        $id             = $post['id'];
        $item           = $post['item'];
        $categoria      = $post['categoria'];
        $cantidad       = $post['cantidad'];
        $valor          = $post['valor'];
        $umbral         = $post['umbral'];

        $result = $this->Inventory->edit_inventory($id, $item, $categoria, $cantidad, $valor, $umbral);
        if($result){
            header("Location: ../pages/inventario?success=1");
        }else{
            header("Location: ../pages/inventario?error=1");
        }
    }

    public function delete_inventory($get){
        $id = $get['id'];
        $result = $this->Inventory->delete_inventory($id);
        if($result){
            header("Location: ../pages/inventario?success=1");
        }else{
            header("Location: ../pages/inventario?error=1");
        }
    }
}