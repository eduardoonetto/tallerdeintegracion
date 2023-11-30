<?php
class WorkOrdersModel {
    private $conexion;
    private $table = 'workorders';

    public function __construct() {
        $this->conexion = $this->createConnection();
    }

    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; // Asumiendo que $conexion es el nombre de la variable en ConnectionSql.php
    }

    public function get_ot_by_id($id) {
        // Consulta SQL
        $query = "SELECT
        Customers.id AS customer_id,
        Customers.name,
        Customers.email,
        Customers.phone,
        Customers.address,
        Customers.rut,
        Vehicles.id AS vehicle_id,
        Vehicles.make,
        Vehicles.model,
        Vehicles.year,
        Vehicles.reason_visit,
        Vehicles.patente,
        WorkOrders.id AS workorder_id,
        WorkOrders.date_created,
        WorkOrders.total_amount,
        WorkOrders.status as status_order,
        WorkOrders.description,
        WorkOrders.user_id
        FROM
        Customers
        JOIN
        Vehicles ON Customers.id = Vehicles.customer_id
        JOIN
        WorkOrders ON Vehicles.id = WorkOrders.vehicle_id
        WHERE WorkOrders.id = $id";

        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }


    public function insert_ot($vehicleDataId, $fecha_in,  $razon, $description, $status) {
        $stmt = $this->conexion->prepare('INSERT INTO WorkOrders (vehicle_id, date_created, status, description) VALUES (?, ?, ?, ?)');
        mysqli_connect_error();
        $stmt->bind_param('ssss', $vehicleDataId, $fecha_in, $status, $description);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            // Obtener el ID del registro insertado
            $inserted_id = $this->conexion->insert_id;
            return $inserted_id;
        } else {
            return false;
        }
    }

    public function delete_ot($id) {
        
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
    

}
