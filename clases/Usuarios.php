<?php
class Usuarios
{
    private $pdo;

    function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    function insertarUsuario($correo, $password)
    {
        try {
            // Validar que el correo no esté vacío
            if (empty($correo) || empty($password)) {
                throw new InvalidArgumentException("El correo y la contraseña son obligatorios");
            }

            // Validar formato de correo
            if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
                throw new InvalidArgumentException("El formato del correo no es válido");
            }

            $passwordHash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuarios(correo_usuario, password, estatus_usuario) 
                VALUES (?, ?, ?)";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$correo, $passwordHash, 1]);

            return true;
        } catch (PDOException $e) {
            // Log del error (mejor que echo en producción)
            error_log("Error al insertar usuario: " . $e->getMessage());
            return false;
        } catch (InvalidArgumentException $e) {
            error_log("Error de validación: " . $e->getMessage());
            return false;
        }
    }
    public function validarLogin($correo, $contrasena)
    {
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
                        'id' => $usuario['pk_usuario'],
                        'correo' => $usuario['correo_usuario'],
                        'rol' => $usuario['estatus_usuario']
                    ]
                ];
            } else {
                return ['success' => false, 'message' => 'Contraseña incorrecta'];
            }
        } catch (PDOException $e) {
            return ['success' => false, 'message' => 'Error: ' . $e->getMessage()];
        }
    }

    function verUsuarios()
    {
        try {
            $sql = "SELECT * FROM usuarios";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error al obtener los usuarios: " . $e->getMessage();
            return [];
        }
    }

    function eliminarUsuario($pk_usuario)
    {
        $sql = "UPDATE usuarios SET estatus_usuario = 0 WHERE pk_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$pk_usuario]);

        return $stmt->rowCount() > 0; // true si se eliminó, false si no

    }

    function activarUsuario($pk_usuario)
    {
        if (empty($pk_usuario)) {
            return false;
        }

        $sql = "UPDATE usuarios SET estatus_usuario = 1 WHERE pk_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$pk_usuario]);

        return $stmt->rowCount() > 0; // true si se eliminó, false si no

    }

    function editarUsuario($pk_usuario, $correo_usuario, $estatus_usuario, $password = null)
    {
        try {
            if ($password && !empty($password)) {
                // Actualizar con nueva contraseña
                $passwordHash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "UPDATE usuarios SET correo_usuario = ?, password = ?, estatus_usuario = ? WHERE pk_usuario = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$correo_usuario, $passwordHash, $estatus_usuario, $pk_usuario]);
            } else {
                // Mantener contraseña actual
                $sql = "UPDATE usuarios SET correo_usuario = ?, estatus_usuario = ? WHERE pk_usuario = ?";
                $stmt = $this->pdo->prepare($sql);
                $stmt->execute([$correo_usuario, $estatus_usuario, $pk_usuario]);
            }
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }

function obtenerUsuario($pk_usuario)
{
    try {
        $sql = "SELECT * FROM usuarios WHERE pk_usuario = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$pk_usuario]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return false;
    }
}
}
