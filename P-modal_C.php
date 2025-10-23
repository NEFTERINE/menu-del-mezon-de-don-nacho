<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/pedido.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


</head>

<body>
    <header>
        <?php
        // Usar require_once es ideal para componentes críticos como el menú.
        require_once('carrito.php');
        ?>
    </header>

    <!-- ventana de confirmar pedido -->

    <div class="modal" id="modalP">
        <div class="modal-contenido">
            <a href="carrito.php"><span class="cerrar-modal">&times;</span> </a>
            <h2><i class="fa-solid fa-motorcycle"></i> Confirma Tu Pedido</h2>

            <div class="cuenta">

                <div class="general">
                    <p>Resumen de Cuenta</p>
                    <div>
                        <p>1 Producto(s) Total $30.00MX</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>

                <div class="coment">
                    <label>Agregar Comentario</label>
                    <textarea placeholder="Puedes agregar o quitar ingredientes" rows="4"></textarea>
                </div>

                <div class="pago">
                    <p>Método de Pago</p>
                    <select class="metodo-pago">
                        <option value="efectivo"><i class="fa-solid fa-wallet"></i> Efectivo</option>
                        <option value="transferencia"><i class="fa-solid fa-credit-card"></i> Transferencia</option>
                    </select>
                        <p id="alert">* Al seleccionar transferencia ocupara poner normbre del restaurante y motivo de trasferencia</p>
                </div>

                <div class="total">
                    <a href="#"><button class="button">Pedir $30MX</button></a>
                </div>

            </div>

        </div>
    </div>

    <script src="js/cuenta_carrito.js"></script>

</body>

</html>