<?php
require_once 'conexion.php';
require_once '../clases/Usuarios.php';

// Verificar que la solicitud es POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Método no permitido");
}

// Verificar que los campos requeridos están presentes
if (!isset($_POST['email']) || !isset($_POST['password'])) {
    echo "<script>
        alert('Todos los campos son obligatorios');
        history.back();
    </script>";
    exit;
}

$funcionesUsuario = new Usuarios($pdo);

$correo = trim($_POST['email']);
$contra = $_POST['password'];

// Validar que los campos no estén vacíos
if (empty($correo) || empty($contra)) {
    echo "<script>
        alert('El correo y la contraseña son obligatorios');
        history.back();
    </script>";
    exit;
}

// Intentar insertar el usuario
$resultado = $funcionesUsuario->insertarUsuario($correo, $contra);

if($resultado) {
    echo "<script> 
        alert('Usuario creado con éxito');
        location.href='../Lista_usuario.php';
    </script>"; 
} else {
    echo "<script>
        alert('Error al crear el usuario. El correo puede estar en uso.');
        history.back();
    </script>";
}
?>