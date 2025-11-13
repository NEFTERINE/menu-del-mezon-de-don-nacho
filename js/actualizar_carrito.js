// <?php
// session_start();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $input = json_decode(file_get_contents('php://input'), true);
    
//     if (isset($input['carrito'])) {
//         $_SESSION['carrito'] = $input['carrito'];
//         echo json_encode(['success' => true]);
//     } else {
//         echo json_encode(['success' => false, 'error' => 'Datos inválidos']);
//     }
//     exit;
// }
// ?>