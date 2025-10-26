<?php
require_once 'conexion.php';
require_once '../clases/Categorias.php';

$funciones = new Categorias($pdo);

if(isset($_POST['nombreCategoria'])) {
    $nomcategoria = $_POST['nombreCategoria'];

    $resultado = $funciones->insertarCategorias($nomcategoria);

    if($resultado) {
        echo "<script> alert('Categoría creada con éxito');
    location.href='../index.php';</script>"; 
    }
}

?>