<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Petición inválida");
}

// Guarda los datos del cliente temporalmente
$_SESSION['datos_cliente'] = [
    'nombre' => $_POST['nombre'],
    'telefono' => $_POST['telefono'],
    'colonia' => $_POST['colonia'] ?? null,
    'calle' => $_POST['calle'] ?? null,
    'referencias' => $_POST['referencias'] ?? null
];

// 2. Después de guardar con éxito, redirige a la página del carrito.
// Redirección: La página 'carrito.php' debe incluir el modal #subServicio
header('Location: carrito.php?modal_abrir=subServicio'); 
exit;
?>
