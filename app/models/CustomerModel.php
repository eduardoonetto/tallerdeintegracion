<?php 
class CustomerModel {
    private $conexion;
    private $table = 'Customers';
    public function __construct() {
        $this->conexion = $this->createConnection();
    }

    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; // Asumiendo que $conexion es el nombre de la variable en ConnectionSql.php
    }

    public function new_customer($name, $rut, $email, $phone, $address) {
        $query = "INSERT INTO " . $this->table . " (name, rut, email, phone, address) VALUES ('$name', '$rut', '$email', '$phone', '$address')";
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

    public function get_customers(){
        $query = "SELECT * FROM " . $this->table . " GROUP BY rut";
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function insert_customer($name, $rut, $email, $phone, $address) {
        $stmt = $this->conexion->prepare('INSERT INTO Customers (name, rut, email, phone, address) VALUES (?, ?, ?, ?, ?)');
        mysqli_connect_error();
        $stmt->bind_param('sssss', $name, $rut, $email, $phone, $address);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            // Obtener el ID del registro insertado
            $inserted_id = $this->conexion->insert_id;
            return $inserted_id;
        } else {
            return false;
        }
    }

    public function edit_customer($id, $name, $rut, $email, $phone, $address) {
        $update = "UPDATE Customers SET name = '$name', rut = '$rut', email = '$email', phone = '$phone', address = '$address' WHERE id = '$id'";
        $resultado = mysqli_query($this->conexion, $update);
        mysqli_close($this->conexion);
        if ($resultado) {
            return true; // Inserción exitosa
        } else {
            return false; // Error en la inserción
        }
    }

    public function delete_customer($id){
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
