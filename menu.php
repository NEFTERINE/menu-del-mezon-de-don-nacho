<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="css/C-css.css">
    <link rel="stylesheet" href="css/CSS.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">


</head>

<body>

      <div class="navbar">

    <!-- /*-- Baner --*/ -->

    <div class="baner">
      <img id="baner" src="https://tse3.mm.bing.net/th/id/OIP.Qn95psPy1xeKiQkhCv5TnAHaAv?rs=1&pid=ImgDetMain&o=7&rm=3"
        alt="Baner">
    </div>
    <div class="logo-container">
      <img id="logo" src="imagenes/logo-nacho.jpg" alt="Logo" class="logo">
      <p class="don"> El Meson de Don Nacho </p>
      <a href="#"><i class="fa-solid fa-circle-exclamation" id="abrirModalBtn" style="cursor: pointer;"> </i> </a>
      <a href="https://www.facebook.com/RestauranteElMesonDeDonNacho/"><i class="bi bi-facebook"
          style="cursor: pointer;"> </i> </a>
      <a href="#"><i class="bi bi-telephone-fill" style="cursor: pointer;"> 695 114 5859 </i> </a>
      <a
        href="https://www.bing.com/maps?&cp=22.834479~-105.784682&lvl=18&pi=0&tstt0=El%20mes%C3%B3n%20de%20Don%20Nacho&tsts0=%2526ty%253D18%2526q%253DEl%252520mes%2525C3%2525B3n%252520de%252520Don%252520Nacho%2526ss%253Dypid.YN9001x6046331794669239612%2526mb%253D22.840782~-105.791366~22.825594~-105.774801%2526description%253DAvenida%252520Occidental%2525205%25252C%25252082459%252520Escuinapa%2526cardbg%253D%252523F98745%2526dt%253D1759446000000&ftst=0&ftics=False&v=2&sV=2&form=S00027">
        <i class="fa-solid fa-map-location-dot" style="cursor: pointer;"> </i> </a>

    </div>
    <!-- /*-- Barra de navegación --*/ -->

    <div class="barra">
      <a href="#desayunos">Desayunos</a>
      <a href="#comidad">Comidas</a>
      <a href="#carnes">Carne Asada</a>
      <a href="#bebidas">Bebidas</a>
    </div>
  </div>

  <section id="desayunos" class="section">
    <h2>Desayunos</h2>
  </section>

  <div class="d-flex justify-content-center flex-wrap">

    <div class="card mb-3" id="abrirModalOption">
      <div class="row g-0">
        <div id="card-img" class="col-md-4">
          <img src="https://th.bing.com/th/id/OIP.KYvrHQx6vlVPMHmoe-ENdAHaHa?w=206&h=206&c=7&r=0&o=7&pid=1.7&rm=3"
            class="img-fluid rounded-start" alt="...">
        </div>

        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title">Card title</h5>
            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional
              content. This content is a little bit longer.</p>
            <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
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

</body>

</html>