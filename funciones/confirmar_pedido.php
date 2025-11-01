<?php
session_start();
require_once 'conexion.php';
require_once '../clases/Direcciones.php';
require_once '../clases/Pedidos.php'; // Necesitarás crear esta clase

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['carrito'])) {
    
    $funcionesDireccion = new Direcciones($pdo);
    
    // 1. Guardar dirección del cliente
    $idDireccion = $funcionesDireccion->insertarDireccion(
        $_POST['nombre'],
        $_POST['telefono'],
        $_POST['colonia'],
        $_POST['calle'],
        $_POST['referencias']
    );
    
    if ($idDireccion) {
        // 2. Guardar el pedido con los productos del carrito
        $funcionesPedido = new Pedidos($pdo);
        $pedidoGuardado = $funcionesPedido->guardarPedidoCompleto(
            $idDireccion,
            $_SESSION['carrito'],
            $_POST['metodo_pago'] ?? 'efectivo' ?? 'transferencia',
            $_POST['comentario'] ?? ''
        );
        
        if ($pedidoGuardado) {
            // Limpiar carrito
            unset($_SESSION['carrito']);
            
            echo "<script>
                alert('Pedido confirmado con éxito');
                location.href='../index.php';
            </script>";
        } else {
            echo "<script>
                alert('Error al guardar el pedido');
                location.href='../carrito.php';
            </script>";
        }
    } else {
        echo "<script>
            alert('Error al guardar la dirección');
            location.href='../carrito.php';
        </script>";
    }
    exit;
} else {
    echo "<script>
        alert('No hay productos en el carrito');
        location.href='../carrito.php';
    </script>";
}
?>