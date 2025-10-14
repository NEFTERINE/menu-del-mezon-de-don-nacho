<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/C-css.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


</head>

<body>

    <a href="index.php" id="regreso"><button class="button"> Atrás </button> </a>
    <h2 class="c_tot">MXN $300</h2>

    <div class="productos">
        <div class="producto-seleccion">
            <span id="nombre">Dulce a granel de 250kg </span>
            <span id="costo">MXN $300</span>
        </div>

        <div class="cantidad-control">
            <input type="number" id="cantidad" name="cantidad" min="1" value="1">
        </div>
    </div>

    <div id="panel-servicio-decoracion">
        <br>
        <div id="a">
            <h2> Seleccione el tipo de servicio </h2>
            <br>
            <div class="opciones-servicio">
                <div>
                    <button class="button" id="abrirModalBtnServicio"><i class="fa-solid fa-motorcycle"></i> A
                            Domicilio</button>
                    <p class="llevar"> A Domicilio</p>
                </div>

                <div>
                    <button class="button" id="BtnLocal"><i class="bi bi-fork-knife"></i> En
                            Local</button>
                    <p class="local"> En el local </p>
                </div>
            </div>
        </div>
    </div>

    <?php 
        // Puedes usar include, pero require_once es más seguro
        require_once('F-modal_C.php'); 
        require_once('P-modal_P.php');
    ?>

    <script src="js/cuenta_local.js"></script>
    <script src="js/formulario_carrito.js"></script>

</body>

</html>