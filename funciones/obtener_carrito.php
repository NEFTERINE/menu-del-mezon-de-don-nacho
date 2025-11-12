<?php
session_start();
header('Content-Type: application/json');

$total = 0;
$totalCantidad = 0;
$carrito = [];

if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])) {
    $carrito = $_SESSION['carrito'];
    
    foreach ($carrito as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total += $subtotal;
        $totalCantidad += $item['cantidad'];
    }
}

echo json_encode([
    'success' => true,
    'carrito' => $carrito,
    'total' => $total,
    'totalCantidad' => $totalCantidad
]);
?>