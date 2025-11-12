<?php 
require_once 'funciones/conexion.php';
require_once 'clases/Categorias.php';
require_once 'clases/Usuarios.php';

$funcionesCategoria = new Categorias($pdo);
$verCategorias = $funcionesCategoria->verCategorias();

$funcionesUsuario = new Usuarios($pdo);

// // Validar que existe el parámetro pk_usuario
// if(!isset($_GET['pk_usuario']) || empty($_GET['pk_usuario'])) {
//     die("Error: No se especificó el ID del usuario");
// }

// // Obtener el ID del usuario a editar
// $pk_usuario = $_GET['pk_usuario'];

// // Obtener los datos del usuario
// $datos = $funcionesUsuario->obtenerUsuario($pk_usuario);

// if(!$datos) {
//     die("Usuario no encontrado");
// }


?>

<!-- agregar usuario -->
<div id="registro-usuario" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-modal" id="cerrar-modal">&times;</span>

        <h2>Registrar Nuevo Usuario</h2>

        <form action="funciones/registrarUsuario.php" method="POST">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Registrar Usuario</button>
        </form>

    </div>
</div>

<script src="js/registro-usuario.js"></script>



<!-- editar usuario -->
<div id="editar-usuario" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-Eusuario" id="cerrar-modal">&times;</span>
        <h2>Editar Usuario</h2>
        <form action="funciones/editarUsuario.php" method="POST">
            <input type="hidden" id="editar_pk_usuario" name="pk_usuario">
            <label>Correo:</label>
            <input type="email" id="editar_email" name="email" required>
            <label>Contraseña:</label>
            <input type="password" id="editar_password" name="password" placeholder="Dejar vacío">
            <button type="submit">Guardar</button>
        </form>
    </div>
</div>

<script>
// SOLO ESTO - sin eventos DOMContentLoaded
function abrirModalEditar(id, correo) {
    console.log("Llenando campos...");
    document.getElementById('editar_pk_usuario').value = id;
    document.getElementById('editar_email').value = correo;
    document.getElementById('editar-usuario').style.display = 'block';
}

// Cerrar modal
document.querySelector('.cerrar-Eusuario').onclick = function() {
    document.getElementById('editar-usuario').style.display = 'none';
}

// Cerrar al hacer clic fuera
window.onclick = function(event) {
    if (event.target === document.getElementById('editar-usuario')) {
        document.getElementById('editar-usuario').style.display = 'none';
    }
}
</script>



<!-- agregar plato -->
<div id="registro-platillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-platillo" id="cerrar-modal">&times;</span>

        <h2>Agregar Nuevo Platillo</h2>

        <form action="funciones/registrarPlatillo.php" method="POST" enctype="multipart/form-data">
            <label for="nombre">Nombre del Platillo:</label>
            <input type="text" id="nombrePlatillo" name="nombrePlatillo" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcionPlatillo" name="descripcionPlatillo" required></textarea>

            <label for="precio">Precio:</label>
            <input type="number" id="precioPlatillo" name="precioPlatillo" step="0.01" required>
            
            
            <label for="categoria">Categoría:</label>
            <select id="pk_categoria" name="pk_categoria" required>
                <option value="">Seleccione una categoría</option>
                <?php foreach($verCategorias as $categoria){
                    if ($categoria['estatusCategoria'] == 1) {
                        echo "<option value='".$categoria['pk_categoria']."'>".$categoria['nombreCategoria']."</option>";  
                    }
                }
                ?>  
            </select>
            
            <label>Imagen del Platillo:</label>
            <input type="file" id="imagen_r" name="imagen" accept=".jpg, .jpeg, .png" multiple required>

            <button type="submit">Agregar Platillo</button>
        </form>
    </div>
</div>

<script src="js/registro_platillo.js"></script>




<!-- agregar categoria -->
<div id="registro-categoria" class="modal">
    <div class="modal-contenido">

        <span style="cursor: pointer;" class="cerrar-categoria" id="cerrar-modal">&times;</span>

        <h2>Agregar Nueva Categoría</h2>

        <form action="funciones/registrarCategoria.php" method="POST">
            <label for="nombreCategoria">Nombre de la Categoría:</label>
            <input type="text" id="nombreCategoria" name="nombreCategoria" required>

            <button type="submit">Agregar Categoría</button>
        </form>

    </div>
</div>

<script src="js/registro_categoria.js"></script>
