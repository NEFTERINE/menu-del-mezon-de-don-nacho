<?php
// funciones/obtener_platillo.php
session_start();
require_once 'conexion.php';
require_once '../clases/Platillos.php';

header('Content-Type: application/json');

if (isset($_GET['id'])) {
    $platilloId = $_GET['id'];
    
    try {
        $funcionesPlatillos = new Platillos($pdo);
        
        // Usar tu función obtenerUnPlatillo
        $platillo = $funcionesPlatillos->obtenerUnPlatillo($platilloId);
        
        if ($platillo) {
            echo json_encode([
                'success' => true,
                'platillo' => [
                    'pk_platillo' => $platillo['pk_platillo'],
                    'nom_platillo' => $platillo['nom_platillo'],
                    'descripcion_platillo' => $platillo['descripcion_platillo'],
                    'precio_platillo' => $platillo['precio_platillo'],
                    'foto_platillo' => $platillo['foto_platillo']
                ]
            ]);
        } else {
            echo json_encode([
                'success' => false,
                'error' => 'Platillo no encontrado'
            ]);
        }
    } catch (Exception $e) {
        echo json_encode([
            'success' => false,
            'error' => 'Error en la base de datos: ' . $e->getMessage()
        ]);
    }
} else {
    echo json_encode([
        'success' => false,
        'error' => 'ID no proporcionado'
    ]);
}
?>