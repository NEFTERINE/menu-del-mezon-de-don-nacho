<?php
require_once 'conexion.php';
require_once '../clases/Platillos.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $platillo = new Platillos($pdo);
    $resultado = $platillo->obtenerUnPlatillo($id);

    header('Content-Type: application/json');
    echo json_encode($resultado);
    exit;
}

?>
