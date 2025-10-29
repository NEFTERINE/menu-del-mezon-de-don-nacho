<?php
class Personas {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

     function insertarPersona($nombrePersona, $apaterno, $amaterno) {
        try {
            $sql = "INSERT INTO persona(nom_persona, a_paterno, a_materno)
                VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombrePersona, $apaterno, $amaterno]);
            $idGenerado = $this->pdo->lastInsertId(); 
            return $idGenerado; // si todo va bien
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
} 
?>