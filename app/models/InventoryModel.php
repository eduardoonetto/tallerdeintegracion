<?php

class InventoryModel {
    private $conexion;
    private $table = 'Inventories';
    public function __construct() {
        $this->conexion = $this->createConnection();
    }


    
    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; 
    }

    public function get_inventories() {
            $query = "SELECT * FROM " . $this->table;
            $resultado = mysqli_query($this->conexion, $query);
            mysqli_close($this->conexion);
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function new_inventory($item, $categoria, $cantidad, $valor, $umbral) {
        $query = "INSERT INTO " . $this->table . " (item, categoria, cantidad, valor, umbral) VALUES ('$item', '$categoria', '$cantidad', '$valor', '$umbral')";
        if ($this->conexion) {
            // La conexión se ha establecido correctamente
            $result = mysqli_query($this->conexion, $query);
        } else {
            echo "Error en la conexión a la base de datos";
            die();
        }
        // Comprobar el resultado
        if ($result) {
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
        
    }

    public function edit_inventory($id, $item, $categoria, $cantidad, $valor, $umbral){
        $query = "UPDATE " . $this->table . " SET item = '$item', categoria = '$categoria', cantidad = '$cantidad', valor = '$valor', umbral = '$umbral' WHERE id = '$id'";
        if ($this->conexion) {
            // La conexión se ha establecido correctamente
            $result = mysqli_query($this->conexion, $query);
        } else {
            echo "Error en la conexión a la base de datos";
            die();
        }
        // Comprobar el resultado
        if ($result) {
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
    }

    public function delete_inventory($id){
        $query = "DELETE FROM " . $this->table . " WHERE id = '$id'";
        if ($this->conexion) {
            // La conexión se ha establecido correctamente
            $result = mysqli_query($this->conexion, $query);
        } else {
            echo "Error en la conexión a la base de datos";
            die();
        }
        // Comprobar el resultado
        if ($result) {
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
    }
}