<?php
require_once 'conexion.php';
require_once '../clases/Platillos.php';
$funcionesPlatillos = new Platillos($pdo);
$pk_platillo = $_GET['pk_platillo'];

$resultado = $funcionesPlatillos->bajaPlatillo( $pk_platillo);

if($resultado) {
    echo "<script> alert('Platillo dado de baja con éxito');
    location.href='../index.php';</script>"; 
}
?>