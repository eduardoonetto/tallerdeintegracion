<?php

require_once('config.php');


// Crear una conexión a la base de datos
$conexion = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

// Verificar la conexión
if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}else{
    return $conexion;
}