<?php
session_start();
require_once 'conexion.php'; // ajusta la ruta según tu estructura
require_once '../clases/Personas.php';
require_once '../clases/Direcciones.php';
require_once '../clases/Clientes.php';
require_once '../clases/Telefonos.php';
$funcionesPersona = new Personas($pdo);
$funcionesDireccion = new Direcciones($pdo);
$funcionesCliente = new Clientes($pdo);
$funcionesTelefono = new Telefonos($pdo);



if (empty($_SESSION['carrito']) || empty($_SESSION['datos_cliente'])) {
    header('Location: ../index.php');
    exit;
//     $_SESSION['datos_cliente'] = [
//     'nombre' => $_POST['nombre'],
//     'aPaterno' => $_POST['aPaterno'],
//     'telefono' => $_POST['telefono'],
//     'direccion' => $_POST['direccion'] ?? null,
//     'referencias' => $_POST['referencias'] ?? null
// ];
}
$cliente = $_SESSION['datos_cliente'];
$carrito = $_SESSION['carrito'];

$fkPersona = $funcionesPersona->insertarPersona($cliente['nombre'], $cliente['aPaterno'], $amaterno ?? null);
$fkCliente = $funcionesCliente->insertarCliente($fkPersona, $fkDireccion ?? null);
$tel = $funcionesTelefono->insertarTelefono($cliente['nombre'], $fkCliente, );

try {
    // Iniciar transacción
    $pdo->beginTransaction();

    // 1️⃣ Insertar detalles de la venta
    $sql_detalle = "INSERT INTO detalle_venta (cantidad_platillo, estatus_detalleVenta, fk_platillo, fk_tipo_servicio)
                    VALUES (:cantidad, 'pendiente', :fk_platillo, :fk_tipo_servicio)";
    $stmt_detalle = $pdo->prepare($sql_detalle);

    $detalle_ids = [];
    $total_venta = 0;

    foreach ($carrito as $item) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $total_venta += $subtotal;

        $stmt_detalle->execute([
            ':cantidad' => $item['cantidad'],
            ':fk_platillo' => $item['id'], // el id del platillo en el carrito
            ':fk_tipo_servicio' => 2 // por ejemplo: 1 = para llevar, 2 = domicilio, etc.
        ]);

        $detalle_ids[] = $pdo->lastInsertId();
    }

    // Asumimos que cada venta puede tener varios detalles, por lo tanto:
    // puedes guardar el primero o unirlos en un solo registro, según tu diseño.
    // Aquí usaremos el primer detalle como referencia (puedes modificarlo según tu modelo).
    $fk_detalle = $detalle_ids[0];

    // 2️⃣ Insertar la venta principal
    $sql_venta = "INSERT INTO ventas 
                    (fk_cliente, fk_detalle_venta, fk_metodo_pago, fch_venta, hora_venta, total_venta, estatus_venta)
                  VALUES 
                    (:fk_cliente, :fk_detalle_venta, :fk_metodo_pago, :fch_venta, :hora_venta, :total_venta, 1)";
    $stmt_venta = $pdo->prepare($sql_venta);

    // Establecer zona horaria de Mazatlán
date_default_timezone_set('America/Mazatlan');

// Fecha y hora actual de Mazatlán
$fecha_actual = date('Y-m-d');
$hora_actual = date('H:i:s');

    $stmt_venta->execute([
        ':fk_cliente' => $fkCliente, // id del cliente logueado o registrado
        ':fk_detalle_venta' => $fk_detalle,
        ':fk_metodo_pago' => $cliente['pkMetPago'] ?? 1, // valor por defecto si no se define
        ':fch_venta' => $fecha_actual,
        ':hora_venta' => $hora_actual,
        ':total_venta' => $total_venta
    ]);

    // Confirmar transacción
    $pdo->commit();

    // Limpiar sesión
    unset($_SESSION['carrito']);
    unset($_SESSION['datos_cliente']);

    echo "<script> alert('Pedido Ordenado con Éxito');
    location.href='../index.php';</script>";
    exit;

} catch (Exception $e) {
    // Revertir en caso de error
    $pdo->rollBack();
    echo "Error al confirmar el pedido: " . $e->getMessage();
}
?>
