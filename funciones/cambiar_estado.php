<?php
session_start();
require_once 'conexion.php';
require_once '../clases/pedidos.php';

$pk_pedido = $_GET['pk_pedido'] ?? 0;

if ($pk_pedido) {
    try {
        // Obtener estado actual
        $sqlCheck = "SELECT type, estatus FROM pedidos WHERE pk_pedido = ?";
        $stmtCheck = $pdo->prepare($sqlCheck);
        $stmtCheck->execute([$pk_pedido]);
        $pedido = $stmtCheck->fetch();

        if ($pedido && $pedido['estatus'] == 0) {
            header('Location: ../lista_pedido.php?error=No se puede cambiar el estado de un pedido cancelado');
            exit;
        }

        // Alternar entre pendiente y entregado
        $nuevo_estado = ($pedido['type'] == 'entregado') ? 'pendiente' : 'entregado';
        
        $pedidosV = new Pedidos($pdo);
        $cambiado = $pedidosV->cambiarType($pk_pedido, $nuevo_estado);

        if ($cambiado) {
            $mensaje = ($nuevo_estado == 'entregado') ? 'Pedido marcado como entregado' : 'Pedido marcado como pendiente';
            header('Location: ../lista_pedido.php?mensaje=' . urlencode($mensaje));
        } else {
            header('Location: ../lista_pedido.php?error=Error al cambiar estado');
        }
    } catch (Exception $e) {
        header('Location: ../lista_pedido.php?error=' . urlencode($e->getMessage()));
    }
} else {
    header('Location: ../lista_pedido.php?error=Pedido no válido');
}
?>