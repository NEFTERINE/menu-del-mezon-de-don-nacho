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
    <script src="js/lista_categorias.js"></script>


    <a href="admin.php" id="regreso" class="button"> Atrás </a>

    <!-- ver lista de categorias -->
    <div id="lista-categorias">
        <div>

            <table>
                <thead>
                    <tr>
                        <th>Nombre de la Categoría</th>
                        <th>Estado</th>
                        <th colspan="2">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'funciones/conexion.php';
                    require_once('clases/Categorias.php');
                    // Crear instancia de Categorias y obtener los datos
                    $categoriaObj = new Categorias($pdo);
                    $categorias = $categoriaObj->verCategorias();

                     foreach ($categorias as $fila) {
                    ?>
                        <tr>
                            <td><?= htmlspecialchars($fila['nombreCategoria']) ?></td>
                            <td><?= $fila['estatusCategoria'] == 1 ? 'Activo' : 'Inactivo' ?></td>
                            <td>
                                <a href="#" class="edit">Editar</a>
                                <a href="#" class="eli">Eliminar</a>
                                <!-- <a href="editar_categoria.php?categoria=<?= $fila['id_categoria'] ?>" class="edit">Editar</a> -->
                                <!-- <?php
                                if ($fila['estatus'] == 1){
 							    echo '<a href="eliminar_producto.php?id_producto=' . $fila['id_categoria'] . '" class="eli" onclick="return confirm(\'¿Estás seguro de que deseas eliminar este producto?\')">Eliminar</a>';

                                }
                                ?> -->
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
            
        </div>
    </div>

    <footer>
        <div class="footer-contenido">

            <div class="footer-item">Contacto:
                <a href="#">
                    <i class="bi bi-telephone-fill"> 695 114 5859</i>
                </a>
            </div>

            <div class="footer-item"> Red Social:
                <a href="https://www.facebook.com/RestauranteElMesonDeDonNacho/">
                    <i class="bi bi-facebook" style="cursor: pointer;"> Facebook</i>
                </a>
            </div>

            <div class="footer-item">Ubicación:
                <a href="https://www.bing.com/maps?&cp=22.834479~-105.784682&lvl=18&pi=0&tstt0=El%20mes%C3%B3n%20de%20Don%20Nacho&tsts0=%2526ty%253D18%2526q%253DEl%252520mes%2525C3%2525B3n%252520de%252520Don%252520Nacho%2526ss%253Dypid.YN9001x6046331794669239612%2526mb%253D22.840782~-105.791366~22.825594~-105.774801%2526description%253DAvenida%252520Occidental%2525205%25252C%25252082459%252520Escuinapa%2526cardbg%253D%252523F98745%2526dt%253D1759446000000&ftst=0&ftics=False&v=2&sV=2&form=S00027">
                    <i class="fa-solid fa-map-location-dot" style="cursor: pointer;"> </i> Calle Occidental, 5 de Mayo 8, 82400 Escuinapa, Sinaloa
                </a>
            </div>

            <div class="footer-copyright">
                <p>&copy; 2025 El Mezon de Don Nacho. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>
</body>

</html>