
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


  <!-- ventana del menu -->
  <div id="ventanaoption" class="modal-option">
    <div class="container-option" id="menu-option">

      <span class="cerrar-modal">&times;</span>

      <div class="card mb-3" id="V-card">
        <div class="row g-0">
          <div id="card-img" class="col-md-4">
            <img src="https://th.bing.com/th/id/OIP.KYvrHQx6vlVPMHmoe-ENdAHaHa?w=206&h=206&c=7&r=0&o=7&pid=1.7&rm=3"
              class="img-fluid rounded-start" alt="...">
          </div>

          <div class="col-md-8">
            <div class="car-body">
              <h5 class="car-title">Card title</h5>
              <p class="car-text">This is a wider card with supporting text below as a natural lead-in to additional
                content. This content is a little bit longer.</p>
            </div>
          </div>

        </div>
      </div>


    </div>
  </div>


  <script src="js/option.js"></script>


  
<!-- MODAL -->
<div id="sesion-modal" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-modal" >&times;</span>
        <h2>Iniciar Sesión</h2>
        
        <form action="#" method="POST">
            <div class="form-grupo">
                <label for="email">Correo Electrónico:</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="form-grupo">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="boton-confirmar">Iniciar Sesión</button>
        </form>

    </div>
</div>

<script src="js/sesion.js"></script>





<!-- editar platillo -->
<div id="editar-platillo" class="modal">
    <div class="modal-contenido">
        <span class="cerrar-modal">&times;</span>

        <h2>Editar Platillo</h2>

        <form action="#" method="POST">
            <label for="nombre">Nombre del Platillo:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="descripcion">Descripción:</label>
            <textarea id="descripcion" name="descripcion" required></textarea>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="categoria">Categoría:</label>
            <select id="categoria" name="categoria" required>
                <option value="">Seleccione una categoría</option>
                <option value="entrada">Desayunos</option>
                <option value="plato_fuerte">Comidas</option>
                <option value="postre">Carne Asada</option>
                <option value="bebida">Bebida</option>
            </select>

            <label for="imagen">Imagen del Platillo:</label>
            <input type="file" id="imagen" name="imagen" accept="image/*">

            <button type="submit">Guardar Cambios</button>
        </form>

    </div>
</div>

<script src="js/editar_platillo.js"></script>