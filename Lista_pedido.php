<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
</head>

<body>
    <header>
        <?php require_once('menu.php'); ?>
    </header>

    <a href="admin.php" id="regreso" class="button">Atrás</a>

    <!-- Lista de pedidos -->
    <div id="lista-pedidos">
        <div>
            <table>
                <thead>
                    <tr>
                        <th>ID Pedido</th>
                        <th>Cliente</th>
                        <th>Teléfono</th>
                        <th>Dirección</th>
                        <th>Referencia</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Fecha</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    require_once 'funciones/conexion.php';
                    require_once('clases/pedidos.php');

                    $pedidosV = new Pedidos($pdo);
                    $pedidos = $pedidosV->verPedido();



                    foreach ($pedidos as $pedido) {
                    ?>
                        <tr>
                            <td>#<?= $pedido['pk_pedido'] ?></td>
                            <td><?= htmlspecialchars($pedido['nombre'] ?? 'Cliente Local') ?></td>
                            <td><?= htmlspecialchars($pedido['telefono'] ?? 'N/A') ?></td>
                            <td>
                                <?php if ($pedido['calle']): ?>
                                    <?= htmlspecialchars($pedido['calle']) ?>, <?= htmlspecialchars($pedido['col']) ?>
                                <?php else: ?>
                                    En Local
                                <?php endif; ?>
                            </td>
                            <td><?= htmlspecialchars($pedido['referencia'] ?? 'N/A') ?></td>
                            <td>$<?= number_format($pedido['total'], 2) ?></td>
                            <td>
                                <span class="estado <?= $pedido['type'] ?>">
                                    <?= ucfirst($pedido['type']) ?>
                                </span>
                            </td>
                            <td><?= date('d/m/Y H:i', strtotime($pedido['fecha_creacion'])) ?></td>
                            <td>
                                <a href="obtener_detalle_pedido.php?pk_pedido=<?= $pedido['pk_pedido'] ?>"><button class="view">Ver Pedido</button></a>

                                <!-- Cambiar TYPE (estado del pedido) -->
                                <a href="funciones/cambiar_estado.php?pk_pedido=<?= $pedido['pk_pedido'] ?>" class="edit"
                                    onclick="return confirm('¿Cambiar estado del pedido #<?= $pedido['pk_pedido'] ?>?')">
                                    <?= $pedido['type'] == 'entregado' ? 'Pedido Entregado' : 'Pedido Pendiente' ?>
                                </a>

                                <!-- Cambiar ESTATUS (activo/inactivo) -->
                                <?php if ($pedido['estatus'] == 1): ?>
                                    <a href="funciones/cancelar_pedido.php?pk_pedido=<?= $pedido['pk_pedido'] ?>" class="eli"
                                        onclick="return confirm('¿Estás seguro de cancelar este pedido?')">Cancelar</a>
                                <?php else: ?>
                                    <a href="funciones/activar_pedido.php?pk_pedido=<?= $pedido['pk_pedido'] ?>" class="act"
                                        onclick="return confirm('¿Estás seguro de activar este pedido?')">Activar</a>
                                <?php endif; ?>

                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>

        </div>
    </div>




    <footer>
        <div class="footer-contenido">

            <div class="footer-item">Contacto:
                <a href="#">
                    <i class="bi bi-telephone-fill"> 695 114 5859</i>
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