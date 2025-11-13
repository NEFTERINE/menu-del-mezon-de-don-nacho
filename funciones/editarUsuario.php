<?php
require_once 'conexion.php';
require_once '../clases/usuarios.php';

$funcionesUsuario = new Usuarios($pdo);

$pk_usuario = $_POST['pk_usuario'];
$email = $_POST['email'];
$password = $_POST['password'];

// Si no se envió contraseña, usar null
$password = empty($password) ? null : $password;

$resultado = $funcionesUsuario->editarUsuario($pk_usuario, $email, 1, $password);

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