<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/CSS.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
    integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


</head>

<body>
<body>

  <!-- ventana emergente -->
  <div id="ventanaInfo" class="modal">

    <div class="modal-contenido">

      <span class="cerrar-modal">&times;</span>

      <div class="container" id="horarios">
        <h3>Dirección</h3>
        <div id="direccion">
          <i class="fa-solid fa-map-location-dot"> El mesón de Don Nacho, Avenida Occidental 5, 82459 Escuinapa</i>
        </div>

        <div id="servicio">
          <h3>Tipos de Servicios</h3>
          <div class="contenedor-tipos">
            <div id="tipo1">
              <p>En el local</p><i class="bi bi-fork-knife"></i>
            </div>
            <div id="tipo2">
              <p>A domicilio</p><i class="fa-solid fa-motorcycle"></i>
            </div>
          </div>
        </div>

        <div id="horario-laboral">
          <h3>Horarios de Atención</h3>
          <div class="fila">
            <p>Domingo</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
          <div class="fila">
            <p>Sábado</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
          <div class="fila">
            <p>Viernes</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
          <div class="fila">
            <p>Jueves</p><i class="fa-solid fa-clock"></i>
            <p>Día no disponible</p>
          </div>
          <div class="fila">
            <p>Miércoles</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
          <div class="fila">
            <p>Martes</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
          <div class="fila">
            <p>Lunes</p><i class="fa-solid fa-clock"></i>
            <p>8:00 AM - 5:00 PM</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/info.js"></script>

</body>

</html>