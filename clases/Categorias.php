<?php
class Categorias {
    private $pdo;
    function __construct($pdo) {
        $this->pdo = $pdo;
    }
    function insertarCategorias($nombreCat) {
        $sql = "INSERT INTO categorias(nombreCategoria, estatusCategoria) 
        VALUES (?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombreCat, 1]);
        $idGenerado = $this->pdo->lastInsertId(); 
        echo "El ID generado es: " . $idGenerado;
        return true;
    }

    function verCategorias() {
        $sql = $this->pdo->query("SELECT * FROM categorias");
        return $sql->fetchAll();
    }

        function CategoriasActivas() {
        $sql = "SELECT * FROM categorias WHERE estatusCategoria = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>