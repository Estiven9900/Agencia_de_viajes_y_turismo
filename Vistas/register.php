<?php
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
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);  // Encriptar la contraseña
    $rol = $_POST['rol']; // Obtener el rol desde el formulario

    // Depuración: imprimir los datos recibidos (esto es temporal, no en producción)
    echo "Datos recibidos: Nombre: $nombre, Apellido: $apellido, Teléfono: $telefono, Email: $email, Rol: $rol <br>";

    // Usar sentencias preparadas para evitar SQL injection
    $stmt = $conn->prepare("INSERT INTO usuarios (nombre, apellido, telefono, email, password, rol) VALUES (?, ?, ?, ?, ?, ?)");
    
    if (!$stmt) {
        die("Error en la preparación de la consulta: " . $conn->error);
    }

    $stmt->bind_param("ssssss", $nombre, $apellido, $telefono, $email, $password, $rol);

    // Ejecutar la consulta y comprobar si fue exitosa
    if ($stmt->execute()) {
        // Cerrar declaración y conexión antes de redirigir
        $stmt->close();
        $conn->close();
        // Redirigir al login después del registro
        header("Location: login.php");
        exit(); // Asegurar la redirección
    } else {
        // Mostrar error específico de SQL
        echo "Error al registrar los datos: " . $stmt->error . "<br>";
        // Verificar si el correo electrónico ya existe (único)
        if ($conn->errno == 1062) {
            echo "El correo electrónico ya está registrado. Intenta con otro.";
        }
    }

    // Cerrar declaración y conexión
    $stmt->close();
    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Clientes</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/register.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form action="register.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono">

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="password" required>

            <!-- Campo oculto para el rol, por ejemplo, "admin" -->
            <input type="hidden" name="rol" value="usuario"> 

            <input type="submit" value="Registrarse">
        </form>
    </div>
</body>
</html>
