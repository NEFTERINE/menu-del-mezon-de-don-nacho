

    <!-- ventana de adomicilio -->
    <div id="modalServicio" class="modal">
        <div class="modal-contenido">
            <span class="cerrarModalServicio">&times;</span>
            <h2><i class="fa-solid fa-motorcycle"></i>Agrega Tu Domicilio</h2>

            <form id="formulario-domicilio" action="guardar_datos.php" method="post">

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
                    <label for="referencia">Referencias:</label>
                    <textarea type="tel" id="referencia" name="referencia" required></textarea>
                </div>

                <button type="submit" id="BtnsubServicio" class="boton-confirmar">Confirmar Dirección</button>

            </form>
        </div>
    </div>

<script src="js/formulario_carrito.js"></script>



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
                    <button class="button-direccion" id="btnAgregarNuevaDireccion">
                        <i class="bi bi-file-plus-fill"></i> Agregar Nueva Dirección
                    </button>
                </div>
            </div>

            <button type="button" class="boton-confirmar" id="BtnCuenta">Confirmar Dirección</button>

        </div>
    </div>
</div>
<script src="js/domicilio_carrito.js"></script>






    <!-- ventana de confirmar pedido -->

    <div class="modal" id="modalP">
        <div class="modal-contenido">
            <span class="cerrar-modal">&times;</span>
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



    
    <!-- ventana de confirmar pedido -->

    <div class="modal" id="LocalCuenta">
        <div class="modal-contenido">
            <span class=".cerrar-modal">&times;</span>
            <h2><i class="bi bi-fork-knife"></i> Confirma Tu Pedido</h2>

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
                    </select>
                </div>

                <div class="total">
                    <a href="#"><button class="button">Pedir $30MX</button></a>
                </div>

            </div>

        </div>
    </div>

    <script src="js/cuenta_local.js"></script>
