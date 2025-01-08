<?php
session_start();

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "mi_usuario";
$password = "mi_contraseña_segura";
$dbname = "agencia_viajes";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar y sanitizar datos del formulario
    $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'] ?? '';

    // Validar que no estén vacíos
    if (empty($email) || empty($password)) {
        $_SESSION['error_message'] = "Todos los campos son obligatorios.";
        header("Location: login.php");
        exit();
    }

    // Consultar usuario por email
    $stmt = $conn->prepare("SELECT id, nombre, password, rol FROM usuarios WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        // Verificar contraseña
        if (password_verify($password, $row['password'])) {
            // Iniciar sesión si la contraseña es válida
            $_SESSION['usuario_id'] = $row['id'];
            $_SESSION['rol'] = $row['rol']; // Asegúrate de tener el campo "rol" en tu tabla.
            $_SESSION['nombre'] = $row['nombre'];

            // Asociar reservas al usuario automáticamente
            $usuario_id = $row['id'];
            $stmtUpdate = $conn->prepare("UPDATE reservas SET usuario_id = ? WHERE email = ? AND usuario_id IS NULL");
            $stmtUpdate->bind_param("is", $usuario_id, $email);

            if ($stmtUpdate->execute()) {
                // Redirigir al usuario a "Mis Viajes" tras éxito
                header("Location: mis_viajes.php");
                exit();
            } else {
                // Error al asociar reservas
                $_SESSION['error_message'] = "Error al asociar reservas: " . $stmtUpdate->error;
                header("Location: login.php");
                exit();
            }
        } else {
            $_SESSION['error_message'] = "Contraseña incorrecta.";
        }
    } else {
        $_SESSION['error_message'] = "El usuario no existe.";
    }

    // Cerrar la consulta y la conexión
    $stmt->close();
    $conn->close();

    // Redirigir al login con mensaje de error
    header("Location: login.php");
    exit();
}
?>
