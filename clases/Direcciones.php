<?php
class Direcciones {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

     function insertarDireccion($col, $calle, $referencia) {
        try {
            $sql = "INSERT INTO direccion(col, calle, referencia)
                VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$col, $calle, $referencia]);
            $idGenerado = $this->pdo->lastInsertId(); 
            return $idGenerado; // si todo va bien
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
} 
?>