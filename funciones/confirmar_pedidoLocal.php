<?php
session_start();
require_once 'conexion.php';
require_once '../clases/Pedidos.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['carrito'])) {
    
    try {
        $funcionesPedido = new Pedidos($pdo);
        
        // Guardar pedido
        $pedidoGuardado = $funcionesPedido->guardarPedidoCompleto(
            null, // Sin dirección para local
            $_SESSION['carrito'],
            $_POST['metodo_pago'] ?? 'efectivo',
            $_POST['comentario'] ?? ''
        );

        if ($pedidoGuardado) {
            // Limpiar carrito
            unset($_SESSION['carrito']);
            
            // Redirigir con mensaje de ÉXITO
            header('Location: ../index.php?pedido=exito');
            exit;
        } else {
            throw new Exception("No se pudo guardar el pedido en la base de datos");
        }

    } catch (Exception $e) {
        // Redirigir con mensaje de ERROR
        header('Location: ../carrito.php?error=' . urlencode($e->getMessage()));
        exit;
    }
    
} else {
    // Carrito vacío
    header('Location: ../carrito.php?error=El carrito está vacío');
    exit;
}
?>