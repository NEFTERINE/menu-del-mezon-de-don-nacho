<?php
class MetPagos {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

    //  function insertarMetPagos($nomMetPago, $estatusMetPago) {
    //     try {
    //         $sql = "INSERT INTO metodo_pago(nom_met_pago, estatus_met_pago)
    //             VALUES (?, ?)";
    //         $stmt = $this->pdo->prepare($sql);
    //         $stmt->execute([$nomMetPago, $estatusMetPago]);
    //         $idGenerado = $this->pdo->lastInsertId(); 
    //         return $idGenerado; // si todo va bien
    //     } catch (PDOException $e) {
    //         echo "Error al insertar: " . $e->getMessage();
    //         return false;
    //     }
    // }

    function verMetPagos() {
        $sql = $this->pdo->query("SELECT * FROM metodo_pago");
        return $sql->fetchAll();
    }
} 
?>