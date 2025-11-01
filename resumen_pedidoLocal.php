<?php
require_once('menu.php');

if (empty($_SESSION['carrito']) || empty($_SESSION['datos_cliente'])) {
  header('Location: index.php');
  exit;
}

$cliente = $_SESSION['datos_cliente'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Resumen del Pedido</title>
  <style>
      body {
          font-family: Arial, sans-serif;
          margin: 20px;
      }
      h2, h3 {
          text-align: left;
          color: #333;
      }
      table {
          width: 100%;
          border-collapse: collapse;
          margin-bottom: 25px;
          background-color: #f9f9f9;
      }
      th, td {
          border: 1px solid #ccc;
          padding: 10px;
          text-align: left;
      }
      th {
          background-color: #e0e0e0;
          width: 30%;
      }
      .total-summary {
          font-size: 1.3em;
          font-weight: bold;
          text-align: right;
          margin-top: 15px;
      }
      .button {
          background-color: #4CAF50;
          color: white;
          padding: 10px 20px;
          border: none;
          border-radius: 4px;
          cursor: pointer;
          font-size: 1em;
      }
      .button:hover {
          background-color: #45a049;
      }
  </style>
</head>
<body>

  <h2>Resumen del Pedido</h2>

  <table>
      <tr>
          <th>Nombre</th>
          <td><?= htmlspecialchars($cliente['nombre']) ." ". htmlspecialchars($cliente['aPaterno'])  ?></td>
      </tr>
      <tr>
          <th>Teléfono</th>
          <td><?= htmlspecialchars($cliente['telefono']) ?></td>
      </tr>
  </table>

  <!-- Carrito -->
  <h3>Carrito</h3>
  <?php
  $total = 0;
  foreach ($_SESSION['carrito'] as $item) {
      $subtotal = $item['precio'] * $item['cantidad'];
      $total += $subtotal;
  ?>
  <table>
      <tr>
          <th>Producto</th>
          <td><?= htmlspecialchars($item['nombre']) ?></td>
      </tr>
      <tr>
          <th>Cantidad</th>
          <td><?= htmlspecialchars($item['cantidad']) ?></td>
      </tr>
      <tr>
          <th>Precio Unitario (MXN)</th>
          <td><?= "$". htmlspecialchars($item['precio']) ?></td>
      </tr>
      <tr>
          <th>Subtotal (MXN)</th>
          <td><?="$".  htmlspecialchars($subtotal) ?></td>
      </tr>
  </table>
  <?php
  }
  ?>

  <div class="total-summary">
      Total: MXN <?= "$". htmlspecialchars($total) ?>
  </div>

  <form action="funciones/confirmar_pedidoLocal.php" method="POST">
    <button type="submit" class="button">Confirmar pedido</button>
  </form>

</body>
</html>
