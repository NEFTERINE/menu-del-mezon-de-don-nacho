<?php
class Usuarios {
    private $pdo;

     function __construct($pdo) {
        $this->pdo = $pdo;
    }

    function insertarUsuario($correo, $password, $fk_persona) {
        try {
            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios(correo_usuario, password, estatus_usuario, fk_persona)
            values (?, ?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$correo, $passwordHash, 1, $fk_persona]);
            return true;
        } catch (PDOException $e) {
            echo "Error al insertar: " . $e->getMessage();
            return false;
        }
    }
    public function validarLogin($correo, $contrasena) {
    try {
        // Consulta preparada para buscar el usuario por correo
        $sql = "SELECT * FROM usuarios WHERE correo_usuario= :correo AND estatus_usuario = 1";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':correo' => $correo]);

        // Verificamos si existe el usuario
        if ($stmt->rowCount() === 0) {
            return ['success' => false, 'message' => 'Usuario no encontrado o inactivo'];
        }
        // echo password_hash('1234', PASSWORD_DEFAULT); <-- Esto sirve si se tiene un registro manual en la BD

        // Obtenemos los datos del usuario
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

        // Validar contraseña (encriptada con password_hash)
        if (password_verify($contrasena, $usuario['password'])) {
            // Opcional: puedes guardar datos en sesión aquí
            return [
                'success' => true,
                'message' => 'Inicio de sesión exitoso',
                'data' => [
                    'pkUsu' => $usuario['pk_usuario'],
                    'correo' => $usuario['correo_usuario'],
                    'estatusUsu' => $usuario['estatus_usuario']
                ]
            ];
        } else {
            return ['success' => false, 'message' => 'Contraseña incorrecta'];
        }

    } catch (PDOException $e) {
        return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
    }
}
}
?>