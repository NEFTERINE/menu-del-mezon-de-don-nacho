<?php
require_once 'conexion.php';
require_once '../clases/usuarios.php';

$funcionesUsuario = new Usuarios($pdo);

$pk_usuario = $_POST['pk_usuario'];
$correo = $_POST['correo_usuario'];
$password = $_POST['password'];

$resultado = $funcionesUsuario->editarUsuario($pk_usuario, $correo,  $password);

if($resultado) {
    echo "<script>
        alert('Usuario actualizado correctamente');
        window.location.href = '../Lista_usuario.php';
    </script>";
} else {
    echo "<script>
        alert('Error al actualizar usuario');
        window.history.back();
    </script>";
}
?>