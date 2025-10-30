<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/footer.css">
</head>

<body>
    <header>
        <?php
        require_once('menu.php');
        require_once 'funciones/conexion.php';
        require_once 'clases/Platillos.php';
        require_once 'clases/Categorias.php'; // Asegúrate de incluir la clase Categorias
        
        $funcionesPlatillos = new Platillos($pdo);
        $todosPlatillos = $funcionesPlatillos->obtenerPlatillos();
        
        // Agrupar platillos por categoría
        $platillosPorCategoria = [];
        foreach ($todosPlatillos as $platillo) {
            if ($platillo['estatus_platillo'] === 1) {
                $categoriaId = $platillo['fk_categoria'];
                if (!isset($platillosPorCategoria[$categoriaId])) {
                    $platillosPorCategoria[$categoriaId] = [];
                }
                $platillosPorCategoria[$categoriaId][] = $platillo;
            }
        }
        ?>
    </header>

    <?php
    // Obtener categorías activas
    $categoriaObj = new Categorias($pdo);
    $categoriasActivas = $categoriaObj->CategoriasActivas();

    foreach ($categoriasActivas as $categoria) {
        $id_html = strtolower(str_replace(' ', '-', $categoria['nombreCategoria']));
        $categoriaId = $categoria['pk_categoria']; // O el nombre correcto de tu columna ID
        
        // Verificar si hay platillos para esta categoría
        if (isset($platillosPorCategoria[$categoriaId]) && count($platillosPorCategoria[$categoriaId]) > 0) {
    ?>
            <section id="<?= $id_html ?>" class="section">
                <h2><?= htmlspecialchars($categoria['nombreCategoria']) ?></h2>
            </section>

            <div class="d-flex justify-content-center flex-wrap">
                <?php
                foreach ($platillosPorCategoria[$categoriaId] as $platillo) {
                ?>
                    <div class="card mb-3">
                        <div class="row g-0">
                            <!-- IMAGEN A LA IZQUIERDA -->
                            <div class="col-md-4">
                                <img class="img-platillo abrir-modal-option" 
                                    data-id="<?=$platillo['pk_platillo'] ?>"
                                     src="imagenes/<?= $platillo['foto_platillo'] ?>" 
                                     class="img-fluid rounded-start" 
                                     alt="<?= htmlspecialchars($platillo['nom_platillo']) ?>">
                            </div>
                            
                            <!-- CONTENIDO A LA DERECHA -->
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title"><?= htmlspecialchars($platillo['nom_platillo']) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($platillo['descripcion_platillo']) ?></p>
                                    <p class="card-text">
                                        <small class="text-body-secondary"><?= "$" . $platillo['precio_platillo'] ?></small>
                                    </p>
                                    <div class="card-actions">
                                        <i id="editar" class="bi bi-pencil-square editar" 
                                           data-id="<?= $platillo['pk_platillo'] ?>" 
                                           title="Editar platillo"></i>

                                        <a href="funciones/bajaPlatillos.php?pk_platillo=<?= $platillo['pk_platillo'] ?>" 
                                           title="Dar de Baja"
                                           onclick="return confirm('¿Estás seguro de dar de baja este platillo?')">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                        
                                        <i class="bi bi-plus-lg agregar-carrito" 
                                           data-id="<?= $platillo['pk_platillo'] ?>"
                                           title="Agregar al carrito"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
    <?php
        }
    }
    ?>

    <div class="list-container">
        <ul class="list">
            <li class="list-group-item">
                <div class="product-info">
                    <div class="product-name">Producto 1</div>
                    <span class="bidge">$10.00</span>
                    <a href="carrito.php" class="action-button"> Ver pedido </a>
                </div>
            </li>
        </ul>
    </div>

    <?php require_once('I-modal_I.php'); ?>

    <script src="js/info.js"></script>
    <script src="js/option.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/editar_platillo.js"></script>

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