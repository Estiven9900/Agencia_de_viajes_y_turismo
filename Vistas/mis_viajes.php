<?php
session_start();
// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

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

// Consultar los viajes del usuario usando JOIN con la tabla reservas
$sql = "SELECT v.id, v.destino, v.fecha_salida, v.fecha_regreso, v.precio, v.descripcion
        FROM reservas r
        INNER JOIN viajes v ON r.viaje_id = v.id
        WHERE r.usuario_id = ?";
$stmt = $conn->prepare($sql);

if (!$stmt) {
    die("Error en la preparación de la consulta: " . $conn->error);
}

$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Viajes</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link rel="stylesheet" href="../css/mis_viajes.css">
</head>
<body>
    <div class="container">
        <h1>Mis Viajes</h1>

        <?php if ($result->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Destino</th>
                        <th>Fecha de Salida</th>
                        <th>Fecha de Regreso</th>
                        <th>Precio</th>
                        <th>Detalles</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($row['destino']); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($row['fecha_salida'])); ?></td>
                            <td><?php echo date("d/m/Y", strtotime($row['fecha_regreso'])); ?></td>
                            <td><?php echo htmlspecialchars(number_format($row['precio'], 2, ',', '.')); ?> COP</td>
                            <td>
                                <a href="detalle_viaje.php?viaje_id=<?php echo $row['id']; ?>" class="btn">Ver Detalles</a>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        <?php else: ?>
            <p>No tienes viajes registrados actualmente.</p>
        <?php endif; ?>

        <a href="../index.html" class="btn">Volver al Inicio</a>
    </div>
</body>
</html>

<?php
// Cerrar declaración y conexión
$stmt->close();
$conn->close();
?>
