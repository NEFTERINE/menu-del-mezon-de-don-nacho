<?php
session_start();
require_once 'conexion.php';
require_once '../clases/pedidos.php';

$pk_pedido = $_GET['pk_pedido'] ?? 0;

if ($pk_pedido) {
    try {
        $pedidosV = new Pedidos($pdo);
        $cancelado = $pedidosV->activarPedido($pk_pedido);
        
        if ($cancelado) {
            header('Location: ../lista_pedido.php?mensaje=Pedido cancelado correctamente');
        } else {
            header('Location: ../lista_pedido.php?error=Error al cancelar pedido');
        }
    } catch (Exception $e) {
        header('Location: ../lista_pedido.php?error=' . urlencode($e->getMessage()));
    }
} else {
    header('Location: ../lista_pedido.php?error=Pedido no válido');
}
?>