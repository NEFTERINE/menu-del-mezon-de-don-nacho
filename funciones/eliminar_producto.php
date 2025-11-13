<?php
session_start();

// Verificar que se recibió el ID
if (isset($_GET['id'])) {
    $productoId = $_GET['id'];
    
    // Buscar y eliminar el producto
    foreach ($_SESSION['carrito'] as $index => $item) {
        if ($item['id'] == $productoId) {
            unset($_SESSION['carrito'][$index]);
            break;
        }
    }
}

// Redirigir de vuelta al carrito
header('Location: ../carrito.php');
exit;
?>