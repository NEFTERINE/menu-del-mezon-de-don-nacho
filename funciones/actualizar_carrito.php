<?php
session_start();
ob_clean();
header('Content-Type: application/json; charset=utf-8');

// ✅ Validaciones básicas de la petición
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo json_encode(['error' => 'Método no permitido']);
    exit;
}

if (!isset($_POST['id'], $_POST['cantidad'])) {
    echo json_encode(['error' => 'Faltan parámetros']);
    exit;
}

$id = $_POST['id'];
$nueva_cantidad = (int) $_POST['cantidad'];

// ⚙️ Validar carrito existente
if (!isset($_SESSION['carrito']) || !is_array($_SESSION['carrito'])) {
    echo json_encode(['error' => 'No hay carrito activo']);
    exit;
}

// 🔄 Buscar y actualizar/eliminar el platillo
$encontrado = false;
foreach ($_SESSION['carrito'] as $index => &$item) {
    if ($item['id'] == $id) {
        $encontrado = true;

        // 🧮 Si la cantidad nueva es menor a 1, elimina el producto
        if ($nueva_cantidad < 1) {
            unset($_SESSION['carrito'][$index]);
        } else {
            // Actualiza la cantidad
            $item['cantidad'] = $nueva_cantidad;
        }
        break;
    }
}
unset($item);

// 🚨 Si no se encontró el platillo
if (!$encontrado) {
    echo json_encode(['error' => 'Platillo no encontrado en el carrito']);
    exit;
}

// 💰 Recalcular el total del carrito
$nuevo_total = 0;
foreach ($_SESSION['carrito'] as $item) {
    $nuevo_total += $item['precio'] * $item['cantidad'];
}

// Si el carrito queda vacío, también puedes eliminarlo
if (empty($_SESSION['carrito'])) {
    unset($_SESSION['carrito']);
}

// ✅ Respuesta JSON válida
echo json_encode([
    'success' => true,
    'nuevo_total' => $nuevo_total,
    'carrito' => $_SESSION['carrito'] ?? []
]);
exit;
?>
