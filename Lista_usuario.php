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
    <script src="js/lista_usuarios.js"></script>


    <a href="admin.php" id="regreso" class="button"> Atrás </a>

    <!-- ver lista de usuarios -->
<div id="lista-usuarios" >
    <div>

        
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Correo Electrónico</th>
                    <th>Contraseña</th>
                    <th>Estado</th>
                    <th>Tipo</th>
                    <th>Opciones</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Maria</td>
                    <td>Maria@gmail.com</td>
                    <td>12345</td>
                    <td>Activo</td>
                    <td>Administrador</td>

                    <td>
                        <button class="edit" name="edit" id="edit-usuario" href="#">Editar</button>
                        <button class="eli" id="eli" href="#">Eliminar</button>
                    </td>
                </tr>
            </tbody>
        </table>

    </div>
</div>

</body>

</html>
