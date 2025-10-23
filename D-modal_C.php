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

    <!-- sub ventana del modalservicio -->
    <div id="subServicio" class="modal">
    <div class="modal-contenido">
        <span class="cerrarsubServicio">&times;</span>

        <h2><i class="fa-solid fa-motorcycle"></i> Selecciona tu Dirección</h2>

        <div id="contenido-domicilio">

            <div class="seccion-datos-usuario">
                <h3 class="titulo-seccion">Tus Datos de Contacto</h3>

                <div class="info-item">
                    <label>Nombre:</label>
                    <p>Lissa</p>
                </div>

                <div class="info-item">
                    <label>Teléfono:</label>
                    <p>694 116****</p>
                </div>
            </div>

            <div class="seccion-direcciones">
                <h3 class="titulo-seccion">Direcciones de Entrega</h3>

                <div class="direccion-item seleccionable activo">
                    <p><i class="bi bi-geo-alt-fill"></i> 21 de Diciembre #11 - Cerca de la tortillería.</p>
                </div>

                <div class="form-grupo">
                    <button class="button-direccion">
                        <i class="bi bi-file-plus-fill"></i> Agregar Nueva Dirección
                    </button>
                </div>
            </div>

            <a href="P-modal_C.php?modal=domicilio"><button type="submit" class="boton-confirmar" id="BtnCuenta">Confirmar Dirección</button></a>

        </div>
    </div>
</div>
    <script src="js/carrito.js"></script>


</body>

</html>