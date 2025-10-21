<!-- agregar usuario -->
<div id="registro-usuario" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-modal" id="cerrar-modal">&times;</span>

        <h2>Registrar Nuevo Usuario</h2>

        <form action="#" method="POST">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <button type="submit">Agregar Usuario</button>
        </form>

    </div>
</div>

<script src="js/registro-usuario.js"></script>




<!-- agregar plato -->
<div id="registro-platillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-platillo" id="cerrar-modal">&times;</span>

        <h2>Agregar Nuevo Platillo</h2>

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

            <button type="submit">Agregar Platillo</button>
        </form>
    </div>
</div>

<script src="js/registro_platillo.js"></script>




<!-- agregar categoria -->
<div id="registro-categoria" class="modal">
    <div class="modal-contenido">

        <span class="cerrar-categoria" id="cerrar-modal">&times;</span>

        <h2>Agregar Nueva Categoría</h2>

        <form action="#" method="POST">
            <label for="nombre">Nombre de la Categoría:</label>
            <input type="text" id="nombre" name="nombre" required>

            <button type="submit">Agregar Categoría</button>
        </form>

    </div>
</div>

<script src="js/registro_categoria.js"></script>




<!-- ver lista de pedidos -->
<div id="lista-pedidos" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-lista-pedidos" id="cerrar-modal">&times;</span>

        <h2>Lista de Pedidos</h2>
        <table>
            <thead>
                <tr>
                    <th>ID Pedido</th>
                    <th>Cliente</th>
                    <th>Telefono</th>
                    <th>Dirección</th>
                    <th>referencia</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>001</td>
                    <td>Juan Perez</td>
                    <td>555-1234</td>
                    <td>Calle Falsa 123</td>
                    <td>Cerca del parque</td>
                    <td>En Proceso</td>

                    <td>
                        <a class="button" id="edit" href="#">Editar</a>
                        <a class="button" id="eli" href="#">Eliminar</a>
                    </td>
                </tr>

                <tr>
                    <td>002</td>
                    <td>Maria Lopez</td>
                    <td>555-5678</td>
                    <td>Avenida Siempre Viva 456</td>
                    <td>Frente a la tienda</td>
                    <td>Entregado</td>

                    <td>
                        <a class="button" id="edit" href="#">Editar</a>
                        <a class="button" id="eli" href="#">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<script src="js/lista_pedidos.js"></script>






<!-- ver lista de usuarios -->
<div id="lista-usuarios" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-lista-usuarios" id="cerrar-modal">&times;</span>

        <h2>Lista de Usuarios</h2>
        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maria</td>
                    <td>Maria@gmail.com</td>
                    <td>Activo</td>

                    <td>
                        <a class="button" id="edit" href="#">Editar</a>
                        <a class="button" id="eli" href="#">Eliminar</a>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

<script src="js/lista_usuarios.js"></script>





<!-- ver lista de categorias -->
<div id="lista-categorias" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-lista-categorias" id="cerrar-modal">&times;</span>
        <h2>Lista de Categorías</h2>
        <table>
            <thead>
                <tr>
                    <th>Nombre de la Categoría</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Entrada</td>
                    
                    <td>
                        <a class="button" id="edit" href="#">Editar</a>
                        <a class="button" id="eli" href="#">Eliminar</a>
                    </td>
            </tbody>
        </table>

    </div>
</div>

<script src="js/lista_categorias.js"></script>