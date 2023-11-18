<?php
class VehicleModel {
    private $conexion;
    private $table = 'Vehicles';
    public function __construct() {
        $this->conexion = $this->createConnection();
    }

    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; // Asumiendo que $conexion es el nombre de la variable en ConnectionSql.php
    }

    public function get_vehicles_customers(){
        $query = "SELECT * FROM Customers AS C INNER JOIN Vehicles AS V ON C.id = V.customer_id";
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function get_vehicles() {
        $query = "SELECT * FROM " . $this->table;
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function get_vehicle_by_id($id) {
        $query = "SELECT NAME, EMAIL, CHANGE_PASSWORD FROM " . $this->table ." WHERE EMAIL = '" .$correo . "'";
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function insert_vehicle($fecha_in, $patente, $marca, $modelo, $year, $razon, $customer_id) {
        
        // Construir la consulta SQL directamente con los valores
        $query = "INSERT INTO " . $this->table . " (date_in, patente, make, model, year,  reason_visit, customer_id) VALUES ('$fecha_in', '$patente', '$marca', '$modelo', '$year', '$razon', '$customer_id')";
        //nombre, rut, telefono, email, direccion, '$nombre', '$rut', '$telefono', '$email', '$direccion',
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

    public function edit_vehicle($id, $fecha_in, $patente, $marca, $modelo, $anio, $razon, $customerDataId) {
        

        $query = "UPDATE " . $this->table . " SET date_in = '$fecha_in', patente = '$patente', make = '$marca', model = '$modelo', year = '$anio', reason_visit = '$razon', customer_id = '$customerDataId' WHERE id = '$id'";
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

    public function delete_vehicle($id) {
        
        $query = "DELETE FROM " . $this->table . " WHERE id = $id";
        if ($this->conexion) {
            // La conexión se ha establecido correctamente
            $result = mysqli_query($this->conexion, $query);
        
            if ($result) {
                // La consulta de eliminación se realizó con éxito
                if (mysqli_affected_rows($this->conexion) > 0) {
                    // Se eliminó al menos una fila
                    return true;
                } else {
                    // No se eliminó ninguna fila
                    return false;
                }
            } else {
                // Hubo un error en la consulta
                echo "Error en la consulta: " . mysqli_error($this->conexion);
                return false;
            }
        } else {
            echo "Error en la conexión a la base de datos";
            die();
        }

    }

    private function _ejecuta_query($query){
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
