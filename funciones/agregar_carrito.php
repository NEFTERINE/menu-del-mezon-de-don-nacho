<?php
session_start();

$id = $_POST['id'] ?? null;
$nombre = $_POST['nombre'] ?? '';
$precio = $_POST['precio'] ?? 0;
$cantidad = $_POST['cantidad'] ?? 1;

// Validación rápida
if (!$id) {
    echo json_encode(['success' => false, 'message' => 'Falta el id del platillo']);
    exit;
}

// Si no existe el carrito, lo creamos
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = [];
}

// Si el producto ya está en el carrito, aumenta la cantidad
if (isset($_SESSION['carrito'][$id])) {
    $_SESSION['carrito'][$id]['cantidad'] += $cantidad;
} else {
    // Si no está, lo agregamos
    $_SESSION['carrito'][$id] = [
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad,
        'id' => $id
    ];
}

$total = 0;
$totalCantidad = 0;
if (!empty($_SESSION['carrito'])) {
  foreach ($_SESSION['carrito'] as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;                // Sumar precios totales
        $totalCantidad += $item['cantidad']; // Sumar cantidades totales
    }
    $_SESSION['total'] = $total;
    $_SESSION['totalCantidad'] = $totalCantidad;
}

echo json_encode(['success' => true, 'carrito' => $_SESSION['carrito']]);
?>
