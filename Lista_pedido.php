<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">

</head>

<body>
    <header>
        <?php
        // Usar require_once es ideal para componentes críticos como el menú.
        require_once('menu.php');
        ?>
    </header>
        <?php
    // Puedes usar include, pero require_once es más seguro
    require_once('I-modal_I.php');    
    require_once('L-modal_L.A.php');

    ?>


    <script src="js/info.js"></script>
    <script src="js/option.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/lista_pedidos.js"></script>

    <a href="admin.php" id="regreso" class="button"> Atrás </a>

    <!-- ver lista de pedidos -->
    <div id="lista-pedidos">
        <div>

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
                        <button class="edit" name="edit" id="editar-plato" href="#">Editar</button>
                        <button class="eli" id="eli" href="#">Eliminar</button>
                        </td>
                    </tr>

                </tbody>
            </table>

        </div>
    </div>

</body>

</html>