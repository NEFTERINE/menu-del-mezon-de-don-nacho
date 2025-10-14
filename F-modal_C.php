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

    <!-- ventana de adomicilio -->
    <div id="modalServicio" class="modal">
        <div class="modal-contenido">
            <span class="cerrarModalServicio">&times;</span>
            <h2><i class="fa-solid fa-motorcycle"></i>Agrega Tu Domicilio</h2>

            <form id="formulario-domicilio">

                <div class="form-grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-grupo">
                    <label for="telefono">Teléfono de contacto:</label>
                    <input type="number" id="telefono" name="telefono" required>
                </div>

                <div class="form-grupo">
                    <label for="colonia">Colonia / Barrio:</label>
                    <input type="text" id="colonia" name="colonia" required>
                </div>

                <div class="form-grupo">
                    <label for="referencia">Referencias (opcional):</label>
                    <textarea type="tel" id="referencia" name="referencia" required></textarea>
                </div>

                <button type="submit" id="BtnsubServicio" class="boton-confirmar">Confirmar Dirección</button>

            </form>
        </div>
    </div>
    <script src="js/domicilio_carrito.js"></script>

    <?php 
        // Puedes usar include, pero require_once es más seguro
        require_once('D-modal_C.php');
    ?>


    <script src="js/formulario_carrito.js"></script>

</body>

</html>