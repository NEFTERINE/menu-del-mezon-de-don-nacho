<?php
require_once 'conexion.php';
require_once '../clases/Platillos.php';
$funcionesPlatillos = new Platillos($pdo);

$nombrePlatillo = $_POST['nombrePlatillo'];
$descripcionPlatillo = $_POST['descripcionPlatillo'];
$precioPlatillo = $_POST['precioPlatillo'];
$fk_categoria = $_POST['pk_categoria'];
//obtengo el archivo y el nombre de la foto
$archivo=$_FILES['imagen']['tmp_name'];
$nombre_archivo=$_FILES['imagen']['name'];
move_uploaded_file($archivo, '../imagenes/'.$nombre_archivo);

$resultado = $funcionesPlatillos->insertarPlatillo($nombrePlatillo, $precioPlatillo, 
$descripcionPlatillo, $nombre_archivo, $fk_categoria );

if($resultado) {
    echo "<script> alert('Platillo creada con éxito');
    location.href='../index.php';</script>";
}

?>