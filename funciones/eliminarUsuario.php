<?php 
require_once('conexion.php');
require_once('../clases/Usuarios.php');  // Ruta corregida

$funcionesUsuario = new Usuarios($pdo);  

// Verifica si el parámetro 'pk_usuario' está presente en la URL
if (isset($_GET['pk_usuario'])) {
    $pk_usuario = filter_input(INPUT_GET, 'pk_usuario', FILTER_VALIDATE_INT);
    
    if ($pk_usuario) {
        $respuesta = $funcionesUsuario->eliminarUsuario($pk_usuario);
        
        if ($respuesta) {
            // Si el usuario se está eliminando a sí mismo, cerrar sesión
            session_start();
            if (isset($_SESSION['usuario_id']) && $_SESSION['usuario_id'] == $pk_usuario) {
                echo "<script>
                    alert('Tu usuario ha sido eliminado');
                    location.href = 'cerrar_sesion.php';
                </script>";
            } else {
                echo "<script>
                    alert('Usuario eliminado correctamente');
                    location.href = '../Lista_usuario.php';
                </script>";
            }
        } else {
            echo "<script>
                alert('Error al eliminar el usuario');
                location.href = '../Lista_usuario.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('ID de usuario no válido');
            location.href = '../Lista_usuario.php';
        </script>";
    }
} else {
    echo "<script>
        alert('No se ha especificado un ID de usuario');
        location.href = '../Lista_usuario.php';
    </script>";
}
?>