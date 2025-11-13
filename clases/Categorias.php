<?php
class Categorias
{
    private $pdo;
    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }
    function insertarCategorias($nombreCat)
    {
        $sql = "INSERT INTO categorias(nombreCategoria, estatusCategoria) 
        VALUES (?, ?)";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$nombreCat, 1]);
        $idGenerado = $this->pdo->lastInsertId();
        echo "El ID generado es: " . $idGenerado;
        return true;
    }

    function verCategorias()
    {
        $sql = $this->pdo->query("SELECT * FROM categorias");
        return $sql->fetchAll();
    }

    function CategoriasActivas()
    {
        $sql = "SELECT * FROM categorias WHERE estatusCategoria = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //categorias activas que se muestran solo si tienen un platillo relacionado
    function CategoriaPlatillo()
    {
        $sql = "SELECT DISTINCT c. * FROM categorias c INNER JOIN platillos p ON c.pk_categoria = p.fk_categoria WHERE c.estatusCategoria = 1 AND p.estatus_platillo = 1";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //dar de baja la categoria
    function eliminarCategoria($pkCategoria)
    {
        $sql = "UPDATE categorias SET estatusCategoria = 0 WHERE pk_categoria = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$pkCategoria]);

        return $stmt->rowCount() > 0; // true si se eliminó, false si no

    }

        function activarCategoria($pk_Categoria)
    {
        $sql = "UPDATE categorias SET estatusCategoria = 1 WHERE pk_categoria = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$pk_Categoria]);

        return $stmt->rowCount() > 0; // true si se eliminó, false si no

    }

}
