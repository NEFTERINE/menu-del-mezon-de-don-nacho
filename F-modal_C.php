    <!-- ventana de formulario -->
    <?php
    require_once 'funciones/conexion.php';
    ?>
    <!-- Modal 1 - Formulario -->
    <div id="modalServicio" class="modal">
        <div class="modal-contenido">
            <span class="cerrarModalServicio">&times;</span>
            <h2><i class="fa-solid fa-motorcycle"></i>Agrega Tu Domicilio</h2>

            <form action="carrito.php" method="post">
                <div class="form-grupo">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>

                <div class="form-grupo">
                    <label for="telefono">Teléfono:</label>
                    <input type="number" id="telefono" name="telefono" maxlength="10" required>
                </div>

                <div class="form-grupo">
                    <label for="colonia">Colonia:</label>
                    <input type="text" id="colonia" name="colonia" required>
                </div>

                <div class="form-grupo">
                    <label for="calle">Calle:</label>
                    <input type="text" id="calle" name="calle" required>
                </div>

                <div class="form-grupo">
                    <label for="referencias">Referencias:</label>
                    <textarea id="referencias" name="referencias" required></textarea>
                </div>

                <!-- Campo oculto para indicar qué modal abrir -->
                <input type="hidden" name="abrir_modal" value="subServicio">

                <button type="submit" class="boton-confirmar">Confirmar Dirección</button>
            </form>
        </div>
    </div>








    <!-- ventana de domicilio -->
    <div id="subServicio" class="modal">
        <div class="modal-contenido">
            <span class="cerrarsubServicio">&times;</span>
            <h2><i class="fa-solid fa-motorcycle"></i> Selecciona tu Dirección</h2>

            <div id="contenido-domicilio">
                <!-- Sección de datos del usuario -->
                <div class="seccion-datos-usuario">
                    <h3 class="titulo-seccion">Tus Datos de Contacto</h3>
                    <div class="info-item">
                        <label>Nombre:</label>
                        <p><?= htmlspecialchars($_SESSION['datos_cliente']['nombre'] ?? '') ?></p>
                    </div>
                    <div class="info-item">
                        <label>Teléfono:</label>
                        <p><?= htmlspecialchars($_SESSION['datos_cliente']['telefono'] ?? '') ?></p>
                    </div>
                </div>

                <!-- Sección de direcciones -->
                <div class="seccion-direcciones">
                    <h3 class="titulo-seccion">Dirección de Entrega</h3>

                    <div class="direccion-item seleccionable activo">
                        <p><i class="bi bi-geo-alt-fill"></i>
                            <?= htmlspecialchars($_SESSION['datos_cliente']['colonia'] ?? '') ?> <?= htmlspecialchars($_SESSION['datos_cliente']['calle'] ?? '') ?>
                        </p>
                        <p><?= htmlspecialchars($_SESSION['datos_cliente']['referencias'] ?? '') ?></p>
                    </div>

                    <div class="form-grupo">
                        <button type="button" class="button-direccion" id="btnAgregarNuevaDireccion">
                            <i class="bi bi-file-plus-fill"></i> Cambiar Dirección
                        </button>
                    </div>
                </div>

                <!-- Formulario para pasar al siguiente modal -->
                <form>
                    <!-- Pasar todos los datos ocultos -->
                    <input type="hidden" name="nombre" value="<?= htmlspecialchars($_SESSION['datos_cliente']['nombre'] ?? '') ?>">
                    <input type="hidden" name="telefono" value="<?= htmlspecialchars($_SESSION['datos_cliente']['telefono'] ?? '') ?>">
                    <input type="hidden" name="colonia" value="<?= htmlspecialchars($_SESSION['datos_cliente']['colonia'] ?? '') ?>">
                    <input type="hidden" name="calle" value="<?= htmlspecialchars($_SESSION['datos_cliente']['calle'] ?? '') ?>">
                    <input type="hidden" name="referencias" value="<?= htmlspecialchars($_SESSION['datos_cliente']['referencias'] ?? '') ?>">

                    <button type="submit" class="boton-confirmar" id="BtnCuenta">Confirmar Dirección</button>
                </form>
            </div>
        </div>
    </div>






    <!-- ventana de confirmar pedido carrito -->
    <div class="modal" id="modalP">
        <div class="modal-contenido">
            <span class="cerrar-cuenta" id="cerrar-modal">&times;</span>
            <h2><i class="fa-solid fa-motorcycle"></i> Confirma Tu Pedido</h2>

            <div class="cuenta">
                <div class="general" id="resumen">
                    <p>Resumen de Cuenta</p>
                    <div>
                        <?php
                        $total_productos = 0;
                        $total_precio = 0;

                        if (!empty($_SESSION['carrito'])) {
                            foreach ($_SESSION['carrito'] as $item) {
                                $total_productos += $item['cantidad'];
                                $total_precio += $item['precio'] * $item['cantidad'];
                            }
                        }
                        ?>
                        <p><?= $total_productos ?> Producto(s) Total $<?= number_format($total_precio, 2) ?>MX</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>

                <div class="detalle-productos" id="detalle">
                    <table>
                        <thead>
                            <tr>
                                <td>Resumen de cuenta</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($_SESSION['carrito'])): ?>
                                <?php foreach ($_SESSION['carrito'] as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['nombre']) ?> x<?= $item['cantidad'] ?></td>
                                        <td>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2"><strong>Total $<?= number_format($total_precio, 2) ?></strong></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">No hay productos en el carrito</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="coment">
                    <label>Agregar Comentario</label>
                    <textarea placeholder="Puedes agregar o quitar ingredientes" rows="4" name="comentario"></textarea>
                </div>

                <div class="pago">
                    <p>Método de Pago</p>
                    <select class="metodo-pago" name="metodo_pago">
                        <option value="efectivo"><i class="fa-solid fa-wallet"></i> Efectivo</option>
                        <option value="transferencia"><i class="fa-solid fa-credit-card"></i> Transferencia</option>
                    </select>
                    <p id="alert">* Al seleccionar transferencia ocupara poner normbre del restaurante y motivo de trasferencia</p>
                </div>

                <div class="total">
                    <form action="funciones/confirmar_pedido.php" method="POST">
                        <!-- Pasar datos del cliente ocultos -->
                        <input type="hidden" name="nombre" value="<?= htmlspecialchars($_POST['nombre'] ?? '') ?>">
                        <input type="hidden" name="telefono" value="<?= htmlspecialchars($_POST['telefono'] ?? '') ?>">
                        <input type="hidden" name="colonia" value="<?= htmlspecialchars($_POST['colonia'] ?? '') ?>">
                        <input type="hidden" name="calle" value="<?= htmlspecialchars($_POST['calle'] ?? '') ?>">
                        <input type="hidden" name="referencias" value="<?= htmlspecialchars($_POST['referencias'] ?? '') ?>">
                        <input type="hidden" name="metodo_pago" id="inputMetodoPagoDomicilio">
                        <input type="hidden" name="comentario" id="inputComentarioDomicilio">

                        <button type="submit" class="button" id="btn-pedir-domicilio">Pedir $<?= number_format($total_precio, 2) ?>MX</button>
                    </form>
                </div>
            </div>
        </div>
    </div>





    <!-- ventana de confirmar pedido local -->

    <div class="modal" id="LocalCuenta">
        <div class="modal-contenido">
            <span class="cerrar-local" id="cerrar-modal">&times;</span>
            <h2><i class="bi bi-fork-knife"></i> Confirma Tu Pedido</h2>

            <div class="cuenta">
                <!-- f_modal_c.php -->
                <div class="general" id="flecha-resumen">
                    <p>Resumen de Cuenta</p>
                    <div>
                        <?php
                        $total_productos = 0;
                        $total_precio = 0;
                        if (!empty($_SESSION['carrito'])) {
                            foreach ($_SESSION['carrito'] as $item) {
                                $total_productos += $item['cantidad'];
                                $total_precio += $item['precio'] * $item['cantidad'];
                            }
                        }
                        ?>
                        <p><?= $total_productos ?> Producto(s) Total $<?= number_format($total_precio, 2) ?>MX</p>
                        <i class="fa-solid fa-chevron-right"></i>
                    </div>
                </div>

                <div class="detalle-productos" id="detalle-productos">
                    <table>
                        <thead>
                            <tr>
                                <td>Resumen de cuenta</td>
                                <td></td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($_SESSION['carrito'])): ?>
                                <?php foreach ($_SESSION['carrito'] as $item): ?>
                                    <tr>
                                        <td><?= htmlspecialchars($item['nombre']) ?> x<?= $item['cantidad'] ?></td>
                                        <td>$<?= number_format($item['precio'] * $item['cantidad'], 2) ?></td>
                                    </tr>
                                <?php endforeach; ?>
                                <tr>
                                    <td colspan="2"><strong>Total $<?= number_format($total_precio, 2) ?></strong></td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td colspan="2">No hay productos en el carrito</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div class="coment">
                    <label>Agregar Comentario</label>
                    <textarea placeholder="Puedes agregar o quitar ingredientes" rows="4" name="comentario_local"></textarea>
                </div>

                <div class="pago">
                    <p>Método de Pago</p>
                    <select class="metodo-pago" name="metodo_pago_local">
                        <option value="efectivo"><i class="fa-solid fa-wallet"></i> Efectivo</option>
                    </select>
                </div>

                <div class="total" id="contenido">
                    <form action="funciones/confirmar_pedidoLocal.php" method="POST">
                        <input type="hidden" name="metodo_pago" id="inputMetodoPagoLocal">
                        <input type="hidden" name="comentario" id="inputComentarioLocal">

                        <button type="submit" class="button" id="btn-pedir-local">Pedir $<?= number_format($total_precio, 2) ?>MX</button>
                    </form>
                </div>
            </div>
        </div>
    </div>