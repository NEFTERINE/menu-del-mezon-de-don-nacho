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
        // Usar require_once es ideal para componentes críticos como el menú.
        require_once('menu.php');
        ?>
    </header>

    
  <section id="desayunos" class="section">
    <h2>Desayunos</h2>
  </section>

  <div class="d-flex justify-content-center flex-wrap">

    <div class="card mb-3">
      <div class="row g-0">
        <div id="card-img" class="col-md-4">
          <img class="img-platillo" id="abrirModalOption" src="https://th.bing.com/th/id/OIP.KYvrHQx6vlVPMHmoe-ENdAHaHa?w=206&h=206&c=7&r=0&o=7&pid=1.7&rm=3"
            class="img-fluid rounded-start" alt="...">
        </div>

        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
              <p class="car-text"><small class="text-body-secondary">$30.00 MX</small></p>
              <i id="editar" class="bi bi-pencil-square"></i>
              <i id="" class="bi bi-plus-lg"></i>
          </div>
        </div>

      </div>
    </div>

  </div>


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


    <?php
    // Puedes usar include, pero require_once es más seguro
    require_once('I-modal_I.php');
    ?>


    <script src="js/info.js"></script>
    <script src="js/option.js"></script>
    <script src="js/sesion.js"></script>
    <script src="js/editar_platillo.js"></script>




    <footer>
        <div class="footer-contenido">

            <div class="footer-item">Contacto:
                <a href="#">
                    <i  class="bi bi-telephone-fill"> 695 114 5859</i>
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