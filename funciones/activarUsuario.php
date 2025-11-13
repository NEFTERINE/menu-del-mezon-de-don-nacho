<?php
require_once('conexion.php'); // 'conexion' minúscula (como tu archivo)
require_once('../clases/Usuarios.php');

$funcionesUsuario = new Usuarios($pdo);

if (isset($_GET['pk_usuario'])) {
    $pk_usuario = $_GET['pk_usuario'];

    // Validar que no esté vacío
    if (empty($pk_usuario)) {
        die("Error: No se ha proporcionado un ID de usuario.");
    }

    $resultado = $funcionesUsuario->activarUsuario($pk_usuario);

    if ($resultado) {
        header("Location: ../Lista_usuario.php"); // Agregué ../
        exit();
    } else {
        echo "Error al activar el usuario. Verifica la conexión y la consulta.";
    }
} else {
    echo "Error: No se ha especificado un ID de usuario.";
}
?>