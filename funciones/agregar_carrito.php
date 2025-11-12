<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Leer los datos JSON
    $input = json_decode(file_get_contents('php://input'), true);
    
    // Inicializar carrito si no existe
    if (!isset($_SESSION['carrito'])) {
        $_SESSION['carrito'] = [];
    }
    
    if (isset($input['id']) && isset($input['nombre']) && isset($input['precio'])) {
        $id = $input['id'];
        $nombre = $input['nombre'];
        $precio = floatval($input['precio']);
        
        // Verificar si el producto ya está en el carrito
        $productoExistente = false;
        foreach ($_SESSION['carrito'] as &$item) {
            if ($item['id'] == $id) {
                $item['cantidad'] += 1;
                $productoExistente = true;
                break;
            }
        }
        
        // Si no existe, agregarlo
        if (!$productoExistente) {
            $_SESSION['carrito'][] = [
                'id' => $id,
                'nombre' => $nombre,
                'precio' => $precio,
                'cantidad' => 1
            ];
        }
        
        echo json_encode(['success' => true, 'message' => 'Producto agregado']);
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos']);
    }
    exit;
}

echo json_encode(['success' => false, 'message' => 'Método no permitido']);
?>