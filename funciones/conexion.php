<?php
 $host= "localhost";
 $usuario= "root";
 $password="mysql";
 $base_datos= "restaurante_don_nacho";

 try {
   //Configurar DSN
   // $dsn = 'mysql:host=' . $host . ';dbname=' . $base_datos; <-- Esta es una manera de hacerlo
   $dsn = "mysql:host=$host;dbname=$base_datos;charset=utf8mb4"; // <-- Esta es otra mandera de hacerlo

   // Crear instancia PDO
    $pdo = new PDO($dsn, $usuario, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

 } catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
 }
?>