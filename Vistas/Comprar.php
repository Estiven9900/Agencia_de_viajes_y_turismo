<?php
// Configuración: reemplazar con tus valores o cargar desde un archivo de configuración/entorno
$servername = getenv('DB_HOST') ?: "localhost";
$username = getenv('DB_USER') ?: "mi_usuario";
$password = getenv('DB_PASS') ?: "mi_contraseña_segura";
$dbname = getenv('DB_NAME') ?: "agencia_viajes";

// Validar si el método es GET y si se proporciona el ID del viaje
if ($_SERVER["REQUEST_METHOD"] !== "GET" || !isset($_GET['id_viaje'])) {
    http_response_code(400); // Código de error Bad Request
    die("Solicitud inválida: ID del viaje no proporcionado.");
}

$id_viaje = intval($_GET['id_viaje']); // Asegurar que sea un número entero

try {
    // Crear conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        throw new Exception("Error de conexión a la base de datos: " . $conn->connect_error);
    }

    // Preparar la consulta
    $stmt = $conn->prepare("SELECT destino, lugar_salida, fecha_salida, fecha_regreso, precio FROM viajes WHERE id = ?");
    if (!$stmt) {
        throw new Exception("Error al preparar la consulta: " . $conn->error);
    }

    $stmt->bind_param("i", $id_viaje);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si se encontraron resultados
    if ($stmt->num_rows === 0) {
        throw new Exception("Viaje no encontrado.");
    }

    // Asignar resultados
    $stmt->bind_result($destino, $lugar_salida, $fecha_salida, $fecha_regreso, $precio);
    $stmt->fetch();

    // Cerrar el statement y la conexión
    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    // Manejo de errores
    http_response_code(500); // Código de error del servidor interno
    die("Se produjo un error: " . $e->getMessage());
}
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reserva de viaje</title>
    <link rel="icon" type="image/png" href="../img/logo.png">
    <link href="../css/Comprar.css" rel="stylesheet">
</head>
<body>
<div id="clouds">
        <div class="cloud x1"></div>
        <div class="cloud x2"></div>
        <div class="cloud x3"></div>
        <div class="cloud x4"></div>
        <div class="cloud x5"></div>
    </div>
    <div class="container">
    <div id="login">
  <form action="Comprar_handler.php" method="post">
    <h2 style="text-align: center;">Reserva de Viaje</h2>
    
    <h3>Información Personal</h3>
    <span><i class="fontawesome-user"></i></span>
    <input type="text" id="nombre" name="nombre" placeholder="Nombre" required>
    <span><i class="fontawesome-user"></i></span>
    <input type="text" id="apellido" name="apellido" placeholder="Apellido" required>
    <span><i class="fontawesome-phone"></i></span>
    <input type="tel" id="telefono" name="telefono" placeholder="Teléfono" required>
    <span><i class="fontawesome-envelope"></i></span>
    <input type="email" id="email" name="email" placeholder="Correo electrónico" required>
    
    <h3>Detalles del Viaje</h3>
    <input type="text" id="destino" name="destino" value="<?php echo htmlspecialchars($destino); ?>" readonly>
    <input type="text" id="lugar_salida" name="lugar_salida" value="<?php echo htmlspecialchars($lugar_salida); ?>" readonly>
    <input type="date" id="fecha_salida" name="fecha_salida" value="<?php echo htmlspecialchars($fecha_salida); ?>" readonly>
    <input type="date" id="fecha_regreso" name="fecha_regreso" value="<?php echo htmlspecialchars($fecha_regreso); ?>" readonly>
    <input type="text" id="precio" name="precio" value="<?php echo htmlspecialchars(number_format($precio, 2)); ?>" readonly>
    
    <select id="asiento" name="asiento" required>
      <option value="" disabled selected>Seleccione un número de asiento</option>
      <?php for ($i = 1; $i <= 30; $i++): ?>
        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
      <?php endfor; ?>
    </select>
    
    <textarea id="comentarios" name="comentarios" rows="4" cols="50" placeholder="Escriba aquí sus comentarios..."></textarea>
    
    <h3>Pago</h3>
    <select id="metodoPago" name="metodoPago" onchange="mostrarCamposAdicionales()" required>
      <option value="" disabled selected>Seleccione un método de pago</option>
      <option value="bancolombia">Cuenta Bancolombia</option>
      <option value="davivienda">Cuenta Davivienda</option>
      <option value="bbva">Cuenta BBVA</option>
      <option value="bancoagrario">Cuenta Banco Agrario</option>
      <option value="nequi">Nequi</option>
      <option value="fisico">Pago Físico</option>
    </select>
    
    <div id="camposAdicionales" style="display: none;">
      <input type="text" id="numeroCuenta" name="numeroCuenta" placeholder="Número de cuenta">
      <input type="password" id="contrasenaCuenta" name="contrasenaCuenta" placeholder="Contraseña">
    </div>
    
    <label>
      <input type="checkbox" name="acepta_terminos" required> Acepto los términos y condiciones
    </label><br>
    
    <input type="hidden" name="viaje_id" value="<?php echo htmlspecialchars($id_viaje); ?>">
    <input type="submit" value="Reservar">
  </form>
</div>

                </div>
    <script src="../js/select.js"></script>
    <!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Password Toggle JS -->
</body>
</html>
