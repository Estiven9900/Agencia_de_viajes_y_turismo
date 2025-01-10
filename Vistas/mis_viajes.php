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
$sql = "SELECT v.id, v.destino, v.lugar_salida, v.fecha_salida, v.fecha_regreso, v.precio, v.descripcion
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
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/custom.css">
</head>
<body>
<div class="container mx-auto p-6 bg-gray-100 rounded-lg shadow-lg">
    <h1 class="text-3xl font-bold text-center text-blue-600 mb-6">Mis Viajes</h1>

    <?php if ($result->num_rows > 0): ?>
        <div class="overflow-x-auto">
        <table class="min-w-full table-auto border-collapse border border-gray-300 bg-white">
    <thead>
        <tr class="bg-blue-100">
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Destino</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Lugar de Salida</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Fecha de Salida</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Fecha de Regreso</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Precio</th>
            <th class="border border-gray-300 px-4 py-2 text-left text-sm font-semibold text-gray-700">Detalles</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr class="hover:bg-gray-100">
                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['destino']); ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['lugar_salida']); ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo date("d/m/Y", strtotime($row['fecha_salida'])); ?></td>
                <td class="border border-gray-300 px-4 py-2"><?php echo date("d/m/Y", strtotime($row['fecha_regreso'])); ?></td>
                <td class="border border-gray-300 px-4 py-2 text-right"><?php echo htmlspecialchars(number_format($row['precio'], 2, ',', '.')); ?> COP</td>
                <td class="border border-gray-300 px-4 py-2 text-center">
                    <a href="detalle_viaje.php?viaje_id=<?php echo $row['id']; ?>" class="bg-blue-500 hover:bg-blue-600 text-white text-sm px-4 py-2 rounded-lg">Ver Detalles</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </tbody>
</table>
        </div>
    <?php else: ?>
        <p class="text-center text-gray-600 text-lg mt-6">No tienes viajes registrados actualmente.</p>
    <?php endif; ?>

    <div class="text-center mt-6">
        <a href="../index.html" class="bg-gray-700 hover:bg-gray-800 text-white text-sm px-6 py-2 rounded-lg shadow">Volver al Inicio</a>
    </div>
</div>
</body>
</html>

<?php
// Cerrar declaración y conexión
$stmt->close();
$conn->close();
?>
