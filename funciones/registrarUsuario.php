<?php
require_once 'conexion.php';
require_once '../clases/Personas.php';
require_once '../clases/Usuarios.php';
$funcionesPersona = new Personas($pdo);
$funcionesUsuario = new Usuarios($pdo);

$nomPersona = $_POST['nombrePersona'];
$apaterno = $_POST['apaterno'];
$amaterno = $_POST['amaterno'];
$correo = $_POST['email'];
$contra = $_POST['password'];

$resultadoPersona = $funcionesPersona->insertarPersona($nomPersona, $apaterno, $amaterno);


$resultadoUsuario = $funcionesUsuario->insertarUsuario($correo, $password, $resultadoPersona);

if($resultadoPersona && $resultadoUsuario) {
    echo "<script> alert('Usuario creado con éxito');
    location.href='../index.php';</script>"; 
} else {
    echo "error";
}

?>