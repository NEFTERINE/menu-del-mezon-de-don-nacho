<?php
class Platillos {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // 📦 Insertar un nuevo platillo
     function insertarPlatillo($nombre, $precio, $descripcion, $imagen ,$categoria) {
        try {
            $sql = "INSERT INTO platillos (nom_platillo, precio_platillo, descripcion_platillo, foto_platillo, estatus_platillo, fk_categoria)
                VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $precio, $descripcion, $imagen, 1, $categoria]);
            return true; // si todo va bien
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }

    function editarPlatillo($id, $nombre, $descripcion, $precio, $categoria, $imagen) {
    try {  
        if ($imagen) {
            // Si se cargó una nueva imagen
            $sql = "UPDATE platillos 
                    SET nom_platillo = ?, 
                        descripcion_platillo = ?, 
                        precio_platillo = ?, 
                        fk_categoria = ?, 
                        foto_platillo = ?
                    WHERE pk_platillo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $precio, $categoria, $imagen, $id]);
        } else {
            // Si no se cambió la imagen
            $sql = "UPDATE platillos 
                    SET nom_platillo = ?, 
                        descripcion_platillo = ?, 
                        precio_platillo = ?, 
                        fk_categoria = ?
                    WHERE pk_platillo = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$nombre, $descripcion, $precio, $categoria, $id]);
        }
        // Devuelve true si se modificó al menos una fila
        return $stmt->rowCount() > 0;

    } catch (PDOException $e) {
        error_log("Error al editar platillo: " . $e->getMessage());
        return false;
    }
}

    // 🔍 Leer todos los platillos (ya la conoces)
     function obtenerPlatillos() {
        $stmt = $this->pdo->query("SELECT * FROM platillos");
        return $stmt->fetchAll();
    }

    function obtenerUnPlatillo($pk_Platillo) {
        $sql = "SELECT * FROM platillos WHERE pk_platillo = :pk_Platillo";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':pk_Platillo' => $pk_Platillo]);
        return $stmt->fetch(PDO::FETCH_ASSOC); // fetch() si solo esperas uno
    }

    function bajaPlatillo($pkPlatillo) {
        try {
            $sql = "UPDATE platillos SET estatus_platillo = 0 WHERE pk_platillo = :id";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([':id' => $pkPlatillo]);
            // Si quieres comprobar cuántas filas se actualizaron:
            return $stmt->rowCount() > 0; // true si se modificó algo
        } catch (PDOException $e) {
            // En caso de error, puedes manejarlo o registrarlo
            echo "Error al dar de baja el platillo: " . $e->getMessage();
            return false;
        }
    }
} 
?>