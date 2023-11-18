<?php
// Inicia la sesión
session_start();

// Verifica si hay una sesión activa
if (isset($_SESSION['usuario'])) {
    // La sesión está activa, puedes redirigir a la página principal o a donde necesites
    header("Location: app/pages/dashboard.php");
    exit;
} else {
    // La sesión no está activa, redirige a la página de inicio de sesión
    header("Location: app/pages/sign-in.php");
    exit;
}
?>