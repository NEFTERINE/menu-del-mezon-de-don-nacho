<?php
require_once 'conexion.php';
require_once '../clases/Usuarios.php';

$funciones = new Usuarios($pdo);

if (isset($_POST['email']) && isset($_POST['password'])) {
    $correo = $_POST['email'];
    $password = $_POST['password'];

    $resultado = $funciones->validarLogin($correo, $password);

    if ($resultado['success']) {
        echo "✅ Bienvenido, " . $resultado['data']['correo'];
        // Aquí puedes iniciar sesión PHP
        session_start();
        // $_SESSION['usuario'] = $resultado['data'];
        // header("Location: menu.php");
    } else {
        echo "❌ " . $resultado['message'];
    }
}

?>
