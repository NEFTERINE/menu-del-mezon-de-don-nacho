<?php
class Pedidos
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function guardarPedidoCompleto($idDireccion, $carrito, $metodoPago, $comentario)
    {
        try {
            $this->pdo->beginTransaction();

            // 1. Insertar pedido principal
            $sqlPedido = "INSERT INTO pedidos (fk_direccion, metodo_pago, comentario, total, estatus, type, fecha_creacion) 
                         VALUES (?, ?, ?, ?,'1', 'Pendiente', NOW())";
            $stmtPedido = $this->pdo->prepare($sqlPedido);

            // Calcular total
            $total = 0;
            foreach ($carrito as $item) {
                $total += $item['precio'] * $item['cantidad'];
            }

            $stmtPedido->execute([
                $idDireccion,
                $metodoPago,
                $comentario,
                $total
            ]);
            $idPedido = $this->pdo->lastInsertId();

            // 2. Insertar productos del pedido
            $sqlDetalle = "INSERT INTO detalle_pedido (fk_pedido, fk_platillo, cantidad, precio_unitario) 
                          VALUES (?, ?, ?, ?)";
            $stmtDetalle = $this->pdo->prepare($sqlDetalle);

            foreach ($carrito as $item) {
                $stmtDetalle->execute([
                    $idPedido,
                    $item['id'],      // ID del platillo
                    $item['cantidad'],
                    $item['precio']
                ]);
            }

            $this->pdo->commit();
            return $idPedido; // Devolver ID del pedido guardado

        } catch (Exception $e) {
            $this->pdo->rollBack();
            throw new Exception("Error al guardar pedido: " . $e->getMessage());
        }
    }

    function verPedido()
    {
        try {
            $sql = "SELECT p.pk_pedido, p.fk_direccion, p.metodo_pago, p.comentario, 
                       p.total, p.estatus, p.type, p.fecha_creacion,
                       d.nombre, d.telefono, d.col, d.calle, d.referencia
                FROM pedidos p 
                LEFT JOIN direccion d ON p.fk_direccion = d.pk_direccion
                ORDER BY p.fecha_creacion DESC";

            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error al cargar pedidos: " . $e->getMessage());
            return [];
        }
    }

    function verDetallePedido($pk_Pedido)
    {
        try {
            $sql = "SELECT dp.cantidad, dp.precio_unitario, pl.nom_platillo 
FROM detalle_pedido dp 
LEFT JOIN platillos pl ON dp.fk_platillo = pl.pk_platillo 
WHERE dp.fk_pedido = ?;
";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$pk_Pedido]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (Exception $e) {
            error_log("Error al cargar detalles del pedido: " . $e->getMessage());
            return [];
        }
    }

    function cancelarPedido($idPedido) {
    try {
        $sql = "UPDATE pedidos SET estatus = 0 , type = 'Cancelado' WHERE pk_pedido = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$idPedido]);
    } catch (Exception $e) {
        error_log("Error al cancelar pedido: " . $e->getMessage());
        return false;
    }
}

function activarPedido($idPedido) {
    try {
        $sql = "UPDATE pedidos SET estatus = 1 , type = 'Pendiente' WHERE pk_pedido = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$idPedido]);
    } catch (Exception $e) {
        error_log("Error al activar pedido: " . $e->getMessage());
        return false;
    }
}

function cambiarType($idPedido, $nuevoType) {
    try {
        $sql = "UPDATE pedidos SET type = ? WHERE pk_pedido = ?";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$nuevoType, $idPedido]);
    } catch (Exception $e) {
        error_log("Error al cambiar type: " . $e->getMessage());
        return false;
    }
}
}
