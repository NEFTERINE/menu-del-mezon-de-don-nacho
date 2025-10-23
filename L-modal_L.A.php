<div id="editar-usuarios" class="modal">
    <div class="modal-contenido">
        <span class="C-editar-U" id="cerrar-modal">&times;</span>

        <h2>Editar Usuario</h2>

        <form action="#" method="POST">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <label for="type">Tipo:</label>
            <select id="tipo" name="tipo" required>
                <option value="">Seleccione una Tipo</option>
                <option value="entrada">Administrador</option>
                <option value="plato_fuerte">Empleado</option>
            </select>

            <button type="submit">Editar Usuario</button>
        </form>

    </div>
</div>

<script src="js/lista_usuarios.js"></script>




<!-- agregar plato -->
<div id="editar-platillos" class="modal">
    <div class="modal-contenido">
        <span class="C-editar-P" id="cerrar-modal">&times;</span>

        <h2>Editar Platillo</h2>

        <form action="#" method="POST">
            <label for="nombre">Nombre del Platillo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="entrada">Entrada</option>
                <option value="plato_fuerte">Plato Fuerte</option>
                <option value="postre">Postre</option>
                <option value="bebida">Bebida</option>
            </select>

            <label for="imagen">Imagen del Platillo:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*" required>

            <button type="submit">Editar Platillo</button>
        </form>
    </div>
</div>

<script src="js/lista_pedidos.js"></script>




<!-- agregar categoria -->
<div id="editar-categorias" class="modal">
    <div class="modal-contenido">

        <span class="C-categoria" id="cerrar-modal">&times;</span>

        <h2>Agregar Nueva Categoría</h2>

        <form action="#" method="POST">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required>

            <button type="submit">Editar Categoría</button>
        </form>

    </div>
</div>

<script src="js/lista_categorias.js"></script>