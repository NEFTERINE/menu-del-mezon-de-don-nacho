<?php
class Pedidos {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function guardarPedidoCompleto($idDireccion, $carrito, $metodoPago, $comentario) {
        try {
            $this->pdo->beginTransaction();

            // 1. Insertar pedido principal
            $sqlPedido = "INSERT INTO pedidos (fk_direccion, metodo_pago, comentario, total, estatus, fecha_creacion) 
                         VALUES (?, ?, ?, ?, 'pendiente', NOW())";
            $stmtPedido = $this->pdo->prepare($sqlPedido);
            
            // Calcular total
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }
            
            $stmtPedido->execute([$idDireccion, $metodoPago, $comentario, $total]);
            $idPedido = $this->pdo->lastInsertId();

            // 2. Insertar productos del pedido
            $sqlDetalle = "INSERT INTO detalle_pedido (fk_pedido, fk_platillo, cantidad, precio_unitario) 
                          VALUES (?, ?, ?, ?)";
            $stmtDetalle = $this->pdo->prepare($sqlDetalle);
            
            foreach ($carrito as $item) {
                $stmtDetalle->execute([
                    $idPedido,
                    $item['id'], // ID del platillo
                    $item['cantidad'],
                    $item['precio']
                ]);
            }

            $this->pdo->commit();
            return true;

        } catch (Exception $e) {
            $this->pdo->rollBack();
            error_log("Error al guardar pedido: " . $e->getMessage());
            return false;
        }
    }
}
?>