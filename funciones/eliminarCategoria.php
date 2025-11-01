<?php
require_once 'conexion.php';
require_once '../clases/Categorias.php';
$funcionesCategoria = new Categorias($pdo);

$pk_categoria = filter_input(INPUT_GET, 'pk_categoria', FILTER_VALIDATE_INT);

if($pk_categoria) {
    $resultado = $funcionesCategoria->eliminarCategoria( $pk_categoria);
    if ($resultado){
        
    echo "<script> alert('Categoria eliminada con éxito');
    location.href='../Lista_categoria.php';</script>"; 
    } else {
        
    echo "<script> alert('Error al eliminar la Categoria');
    location.href='../Lista_categoria.php';</script>"; 
    }
} else {
    
    echo "<script> alert('ID de Categoria no válido');
    location.href='../Lista_categoria.php';</script>"; 
}
?>