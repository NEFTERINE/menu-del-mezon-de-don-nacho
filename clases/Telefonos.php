<?php
class Telefonos {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

     function insertarTelefono($tel, $fkPersona) {
        try {
            $sql = "INSERT INTO telefonos(telefono, fk_persona)
                VALUES (?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$tel, $fkPersona]);
            $idGenerado = $this->pdo->lastInsertId(); 
            return $idGenerado; // si todo va bien
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
} 
?>