<?php
class Direcciones {
    private $pdo;

    function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function insertarDireccion($nombre, $telefono, $col, $calle, $referencia) {
        try {
            $sql = "INSERT INTO direccion(nombre, telefono, col, calle, referencia) 
                    VALUES (?, ?, ?, ?, ?)"; // 5 parámetros, no 3
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $telefono, $col, $calle, $referencia]);
            return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
            error_log("Error al insertar dirección: " . $e->getMessage());
            return false;
        }
    }

    // Función para obtener direcciones de un cliente
    function obtenerDirecciones($cliente_id) {
        try {
            $sql = "SELECT * FROM direccion WHERE fk_cliente = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$cliente_id]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Error al obtener direcciones: " . $e->getMessage());
            return [];
        }
    }
}
?>