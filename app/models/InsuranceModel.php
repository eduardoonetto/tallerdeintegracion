<?php

class InsuranceModel {
    private $conexion;
    private $table = 'Insurances';
    public function __construct() {
        $this->conexion = $this->createConnection();
    }
    /*CREATE TABLE Insurances(
	id INT AUTO_INCREMENT PRIMARY KEY,
    start_date date,
    end_date date,
    razon_social varchar(80),
    cobertura varchar(80)
    );*/
    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; 
    }

    public function get_insurances() {
            $query = "SELECT * FROM " . $this->table ." ORDER BY cobertura ASC";
            $resultado = mysqli_query($this->conexion, $query);
            mysqli_close($this->conexion);
            return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function new_insurance($start_date, $end_date, $razon_social, $cobertura) {
        $query = "INSERT INTO " . $this->table . " (start_date, end_date, razon_social, cobertura) VALUES ('$start_date', '$end_date', '$razon_social', '$cobertura')";
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

    public function edit_insurance($id, $start_date, $end_date, $razon_social, $cobertura){
        $query = "UPDATE " . $this->table . " SET start_date = '$start_date', end_date = '$end_date', razon_social = '$razon_social', cobertura = '$cobertura' WHERE id = '$id'";
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

    public function delete_insurance($id){
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

    public function count_insurances_vigentes() {
        $query = "SELECT COUNT(*)-1 AS total FROM " . $this->table . " WHERE end_date > CURDATE()";
        $resultado = mysqli_query($this->conexion, $query);
        return mysqli_fetch_assoc($resultado);
    }

    public function close_connection() {
        mysqli_close($this->conexion);
    }
}