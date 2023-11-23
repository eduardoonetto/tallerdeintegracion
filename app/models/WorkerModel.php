<?php
class WorkerModel {
    private $conexion;
    private $table = 'Workers';
    public function __construct() {
        $this->conexion = $this -> createConnection();
    }

    private function createConnection() {
        // Incluye el archivo que configura la conexión y devuelve la conexión
        require('../config/ConnectionSql.php');
        return $conexion; // Asumiendo que $conexion es el nombre de la variable en ConnectionSql.php
    }

    public function obtenerTrabajadores() {
        $query = "SELECT id,rut,nombre,id_worker_role FROM Workers WHERE state = 1";
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function obtenerTrabajadorByRut($rut) {
        //SELECT rut,nombre,name FROM Workers INNER JOIN Worker_Roles ON id_worker_role = Worker_Roles.id WHERE rut = '".$rut. "'";
        $query = "SELECT Workers.id,rut,nombre,name FROM Workers INNER JOIN Worker_Roles ON id_worker_role = Worker_Roles.id WHERE rut = '".$rut. "' AND state = 1";
        //$query = "SELECT rut, nombre, CHANGE_PASSWORD FROM " . $this->table ." WHERE EMAIL = '" .$correo . "'";
        $resultado = mysqli_query($this->conexion, $query);
        mysqli_close($this->conexion);
        return mysqli_fetch_all($resultado, MYSQLI_ASSOC);
    }

    public function editarTrabajador($id,$rut,$nombre,$cargo) {
        $update = "UPDATE Workers SET rut = '$rut', nombre = '$nombre', id_worker_role = '$cargo' , state = 1 WHERE id = '$id'";
        $resultado = mysqli_query($this->conexion, $update);
        mysqli_close($this->conexion);
        if ($resultado) {
            echo $id,$rut, $nombre,$cargo;
            return true; // Inserción exitosa
        } else {            
            return false; // Error en la inserción
        }
    }

    public function insertarTrabajador($rut, $nombre,$cargo) {
        //$query = "INSERT INTO Workers "."(rut,nombre,id_worker_role,state) VALUES ('$rut','$nombre',$cargo,1)";
        $query = "INSERT INTO Workers (rut,nombre,id_worker_role,state) VALUES ('$rut','$nombre',$cargo,1)";
        if ($this->conexion) {
            // La conexión se ha establecido correctamente
            $result = mysqli_query($this->conexion, $query);
        } else {
            echo "Error en la conexión a la base de datos";
            die();
        }
    
    }

    public function eliminarTrabajador($id){
        $query = "UPDATE Workers SET state = 0 WHERE id = '$id'";
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
