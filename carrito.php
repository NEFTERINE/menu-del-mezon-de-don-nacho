<?php
session_start();

$total = 0;

// Verificar si hay carrito
if (!empty($_SESSION['carrito'])) {
    foreach ($_SESSION['carrito'] as $item) {
        // El subtotal de cada producto es precio × cantidad
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;
    }
}
?>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/C-css.css">
    <link rel="stylesheet" href="css/pedido.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
</head>

<body>

    <a href="index.php" id="regreso"><button class="button">Atrás</button></a>

    <!-- Mostrar total calculado -->
    <h2 class="c_tot"><?= "MXN $" . number_format($total, 2) ?></h2>

    <div class="lista-de-productos">
        <?php
        if (!empty($_SESSION['carrito'])) {
            foreach ($_SESSION['carrito'] as $item) {
                $precio = $item['precio'];
                $subtotal = $item['precio'] * $item['cantidad'];
        ?>
        <div class="productos">
            <div class="producto-seleccion">
                <span id="nombre"><?= htmlspecialchars($item['nombre']) ?></span>
                <span id="costo"><?= "MXN $" . number_format($precio, 2) ?></span>
            </div>
            <div class="cantidad-control">
                <input type="number" 
                       id="cantidad" 
                       name="cantidad"  
                       min="1" 
                       value="<?= htmlspecialchars($item['cantidad']) ?>" 
                       data-id="<?= $item['id'] ?>">
            </div>
        </div>
        <?php
            }
        } else {
            echo "<p>No hay productos en el carrito.</p>";
        }
        ?>
    </div>

    <div id="panel-servicio-decoracion">
        <br>
        <div id="a">
            <h2>Seleccione el tipo de servicio</h2>
            <br>
            <div class="opciones-servicio">
                <div>
                    <button class="button btn-servicio" id="abrirModalBtnServicio" data-tipo="domicilio">
                        <i class="fa-solid fa-motorcycle"></i> 
                        A Domicilio
                    </button>
                    <p class="llevar">A Domicilio</p>
                </div>

                <div>
                    <button class="button btn-servicio" id="BtnModalLocal" data-tipo="local">
                        <i class="bi bi-fork-knife"></i> En Local
                    </button>
                    <p class="local">En el local</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
  
    <?php 
        // Puedes usar include, pero require_once es más seguro
        require_once('F-modal_C.php'); 
    ?>

    <?php
// LÓGICA PARA ABRIR MODALS AUTOMÁTICAMENTE
if (isset($_POST['abrir_modal'])) {
    $modal_id = $_POST['abrir_modal'];
    echo "<script>
    document.addEventListener('DOMContentLoaded', function() {
        const modalToOpen = document.getElementById('$modal_id');
        if (modalToOpen) {
            modalToOpen.style.display = 'flex';
        }
    });
    </script>";
}
?>

    <script src="js/eventoCarrito.js"></script> 
    <!-- <script src="js/servicio.js"></script>  -->
    <script src="js/cuenta_local.js"></script>
    <script src="js/formulario_carrito.js"></script>
    <script src="js/formulario_carritoLocal.js"></script>
    <scrpt src="js/cuenta_carrito.js"></script>
    <script src="js/domicilio_carrito.js"></script>

</body>

</html>