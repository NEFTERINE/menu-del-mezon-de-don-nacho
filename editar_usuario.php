<?php 
require_once 'funciones/conexion.php';
require_once 'clases/Usuarios.php';

$funcionesUsuario = new Usuarios($pdo);

// Validar que existe el parámetro pk_usuario
if(!isset($_GET['pk_usuario']) || empty($_GET['pk_usuario'])) {
    die("Error: No se especificó el ID del usuario");
}

// Obtener el ID del usuario a editar
$pk_usuario = $_GET['pk_usuario'];

// Obtener los datos del usuario
$datos = $funcionesUsuario->obtenerUsuario($pk_usuario);

if(!$datos) {
    die("Usuario no encontrado");
}


?>


<!-- editar usuario -->
<div id="editar-usuario" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-Eusuario">&times;</span>
        <h2>Editar Usuario</h2>
        <form action="funciones/editarUsuario.php" method="POST">
            <input type="hidden" id="pk_usuario" name="pk_usuario">
            
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" placeholder="Dejar vacío para no cambiar">

            <button type="submit">Guardar Cambios</button>
        </form>
    </div>
</div>
<script>
// Debug temporal - verifica que los elementos existen
console.log("Modal elemento:", document.getElementById('editar-usuario'));
console.log("Campo pk_usuario:", document.getElementById('pk_usuario'));
console.log("Campo email:", document.getElementById('email'));
</script>

<script src="js/editar-usuario.js"></script>