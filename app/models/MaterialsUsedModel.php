<?php
class MaterialsUsedModel {
    private $conexion;
    private $table = 'materialsused';

    public function __construct() {
        $this->conexion = $this->createConnection();
    }

    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; // Asumiendo que $conexion es el nombre de la variable en ConnectionSql.php
    }
    /* table materialsused: 
    CREATE TABLE MaterialsUsed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    inventories_id VARCHAR(100),
    quantity_used INT,
    total INT,
    work_order_id INT, 
    FOREIGN KEY (work_order_id) REFERENCES WorkOrders(id),
    FOREIGN KEY (inventories_id) REFERENCES Inventories(id)
    );*/

    public function insert_materials_used($inventories_id, $quantity_used, $total, $work_order_id) {
        $stmt = $this->conexion->prepare('INSERT INTO MaterialsUsed (inventories_id, quantity_used, total, work_order_id) VALUES (?, ?, ?, ?)');
        mysqli_connect_error();
        $stmt->bind_param('ssss', $inventories_id, $quantity_used, $total, $work_order_id);
        $stmt->execute();
    
        if ($stmt->affected_rows > 0) {
            // Obtener el ID del registro insertado
            $inserted_id = $this->conexion->insert_id;
            return $inserted_id;
        } else {
            return false;
        }
    
    }

    public function get_materials_used_by_workorder_id($id) {
        // Consulta SQL
        $query = "SELECT
        MaterialsUsed.id AS materialsused_id,
        MaterialsUsed.inventories_id,
        MaterialsUsed.quantity_used,
        MaterialsUsed.total,
        MaterialsUsed.work_order_id,
        Inventories.id AS inventory_id,
        Inventories.item,
        Inventories.valor
        FROM
        MaterialsUsed
        JOIN
        Inventories ON MaterialsUsed.inventories_id = Inventories.id
        WHERE MaterialsUsed.work_order_id = $id";

        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }
    
    public function delete_materials_used_by_workorder_id($id){
        $query = "DELETE FROM " . $this->table . " WHERE work_order_id = '$id'";
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
