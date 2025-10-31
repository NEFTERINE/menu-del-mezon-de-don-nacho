<?php
class Clientes {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

     function insertarCliente($fkPersona, $fkDireccion) {
        try {
           $sql = "INSERT INTO clientes(fk_persona, fk_direccion)
                VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$fkPersona, $fkDireccion]);
            $idGenerado = $this->pdo->lastInsertId(); 
            return $idGenerado; // si todo va bien
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
} 
?>