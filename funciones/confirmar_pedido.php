<?php
session_start();
require_once 'conexion.php';
require_once '../clases/Pedidos.php';

// DEBUG: Ver qué datos llegan
error_log("=== CONFIRMAR PEDIDO DOMICILIO ===");
error_log("Datos POST: " . print_r($_POST, true));
error_log("Datos sesión: " . print_r($_SESSION['datos_cliente'] ?? 'NO HAY', true));

if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_SESSION['carrito'])) {
    
    try {
        // 1. PRIMERO guardar la dirección en la base de datos
        $idDireccion = guardarDireccionEnBD($pdo, $_POST);
        error_log("Dirección guardada con ID: " . $idDireccion);
        
        // 2. LUEGO guardar el pedido
        $pedidosV = new Pedidos($pdo);
        $pedidoGuardado = $pedidosV->guardarPedidoCompleto(
            $idDireccion,           // ID de la dirección
            $_SESSION['carrito'],   // Productos
            $_POST['metodo_pago'] ?? 'efectivo',
            $_POST['comentario'] ?? ''
        );
        
        // 3. Limpiar todo
        if ($pedidoGuardado) {
            unset($_SESSION['carrito']);
            unset($_SESSION['datos_cliente']);
            error_log("✅ Pedido guardado exitosamente");
            header('Location: ../carrito.php?pedido=exito');
            exit;
        } else {
            throw new Exception("Error al guardar el pedido");
        }

    } catch (Exception $e) {
        error_log("❌ Error: " . $e->getMessage());
        header('Location: ../carrito.php?error=' . urlencode($e->getMessage()));
        exit;
    }
    
} else {
    header('Location: ../carrito.php?error=Carrito vacío o método incorrecto');
    exit;
}

// FUNCIÓN PARA GUARDAR DIRECCIÓN (¡ESTO SÍ DEBES IMPLEMENTARLO!)
function guardarDireccionEnBD($pdo, $datos) {
    try {
        $sql = "INSERT INTO direccion (nombre, telefono, col, calle, referencia) 
                VALUES (?, ?, ?, ?, ?)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            $datos['nombre'],
            $datos['telefono'], 
            $datos['colonia'],
            $datos['calle'],
            $datos['referencias']
        ]);
        return $pdo->lastInsertId();
    } catch (Exception $e) {
        error_log("Error al guardar dirección: " . $e->getMessage());
        throw new Exception("No se pudo guardar la dirección");
    }
}
?>