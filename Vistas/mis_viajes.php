<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

// Obtener el ID del usuario desde la sesión
$usuario_id = $_SESSION['usuario_id'];

// Datos de conexión a la base de datos
$servername = "localhost";
$username = "mi_usuario";
$password = "mi_contraseña_segura";
$dbname = "agencia_viajes";

// Crear conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Obtener el nombre y apellido del usuario
$query_user = "SELECT nombre, apellido FROM usuarios WHERE id = ?";
$stmt_user = $conn->prepare($query_user);

if ($stmt_user) {
    $stmt_user->bind_param("i", $usuario_id);
    $stmt_user->execute();
    $result_user = $stmt_user->get_result();
    
    if ($result_user->num_rows > 0) {
        $user_data = $result_user->fetch_assoc();
    } else {
        die("Usuario no encontrado.");
    }

    $stmt_user->close();
} else {
    die("Error en la preparación de la consulta de usuario: " . $conn->error);
}

// Consultar los viajes asociados al usuario
$sql = "
    SELECT v.id, v.destino, v.lugar_salida, v.fecha_salida, v.fecha_regreso, v.precio, v.descripcion
    FROM reservas r
    INNER JOIN viajes v ON r.viaje_id = v.id
    WHERE r.usuario_id = ?
";
$stmt = $conn->prepare($sql);

if ($stmt) {
    $stmt->bind_param("i", $usuario_id);
    $stmt->execute();
    $result = $stmt->get_result();

    // Verificar si hay resultados
    if ($result->num_rows == 0) {
        $viajes = [];
    }
} else {
    die("Error en la preparación de la consulta de viajes: " . $conn->error);
}
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
<body class="bg-gray-100 font-sans">
<header class="bg-blue-500 text-white p-4 flex justify-between items-center">
        <h1 class="text-2xl font-bold">Mis Viajes</h1>
        <div class="flex items-center space-x-4">
            <!-- Mostrar el nombre del usuario -->
            <span class="text-lg">Bienvenido, <?php echo htmlspecialchars($user_data['nombre'] . ' ' . $user_data['apellido']); ?></span>
            <a href="login.php" class="bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600">Cerrar Sesión</a>
        </div>
    </header>

    <!-- Contenido principal -->
    <div class="container mx-auto mt-8">
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
</div>
</body>
</html>

<?php
// Cerrar declaración y conexión
$stmt->close();
$conn->close();
?>
