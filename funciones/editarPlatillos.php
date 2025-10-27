<?php
require_once 'conexion.php';
require_once '../clases/Platillos.php';

$funcionesPlatillos = new Platillos($pdo);

$pkPlatillo = $_POST['pkPlatillo'];
$nombrePlatillo = $_POST['nombre'];
$descripcionPlatillo = $_POST['descripcion'];
$precioPlatillo = $_POST['precio'];
$fk_categoria = $_POST['categoria'];

$archivo=$_FILES['imagen']['tmp_name'];
if($archivo){
	$nombre_archivo=$_FILES['imagen']['name'];
	//lo paso a la carpeta donde quiero que se guarde (en mi proyecto)
	move_uploaded_file($archivo, '../imagenes/'.$nombre_archivo);
} 

//Arreglar que pasa si la varible nombre_archivo no tiene datos.

$resultado = $funcionesPlatillos->editarPlatillo($pkPlatillo, $nombrePlatillo, $descripcionPlatillo, 
$precioPlatillo, $fk_categoria, $nombre_archivo );

if($resultado) {
    echo "<script> alert('Platillo actualizado con éxito');
    location.href='../index.php';</script>"; 
} else {
    echo "Error";
}
?>
