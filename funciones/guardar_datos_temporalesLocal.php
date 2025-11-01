<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    die("Petición inválida");
}

// Guarda los datos del cliente temporalmente
$_SESSION['datos_cliente'] = [
    'nombre' => $_POST['nombre'],
    'aPaterno' => $_POST['aPaterno'],
    'telefono' => $_POST['telefono'],
    'pkMetPago' => $_POST['pk_metodo_pago'] ?? null
];

// Redirigir al resumen
header('Location: ../resumen_pedidoLocal.php');
exit;
?>
