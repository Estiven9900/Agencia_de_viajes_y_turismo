<?php
  // Conexión a la base de datos
  $conn = new mysqli("localhost", "mi_usuario", "mi_contraseña_segura", "agencia_viajes");

  if ($conn->connect_error) {
      die("Error de conexión: " . $conn->connect_error);
  }
  
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Función para limpiar entradas
    function limpiarEntrada($dato) {
        return htmlspecialchars(stripslashes(trim($dato)));
    }

    // Obtener datos del formulario
    $nombre = limpiarEntrada($_POST['nombre'] ?? '');
    $apellido = limpiarEntrada($_POST['apellido'] ?? '');
    $telefono = limpiarEntrada($_POST['telefono'] ?? '');
    $email = limpiarEntrada($_POST['email'] ?? '');
    $destino = limpiarEntrada($_POST['destino'] ?? '');
    $lugar_salida = limpiarEntrada($_POST['lugar_salida'] ?? '');
    $fecha_salida = limpiarEntrada($_POST['fecha_salida'] ?? '');
    $fecha_regreso = limpiarEntrada($_POST['fecha_regreso'] ?? '');
    $numero_asiento = limpiarEntrada($_POST['asiento'] ?? '');
    $comentarios = limpiarEntrada($_POST['comentarios'] ?? null);
    $acepta_terminos = isset($_POST['acepta_terminos']) ? 1 : 0;
    $metodo_pago = limpiarEntrada($_POST['metodoPago'] ?? '');
    $cuenta = limpiarEntrada($_POST['numeroCuenta'] ?? null);
    $contrasena = isset($_POST['contrasenaCuenta']) ? password_hash(limpiarEntrada($_POST['contrasenaCuenta']), PASSWORD_BCRYPT) : null;

    // Validar datos
    $errores = [];
    if (empty($email)) $errores[] = "El correo electrónico es obligatorio.";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) $errores[] = "El correo electrónico no es válido.";
    if (empty($destino)) $errores[] = "El destino es obligatorio.";
    if (empty($lugar_salida)) $errores[] = "El lugar de salida es obligatorio.";
    if (empty($fecha_salida) || empty($fecha_regreso)) $errores[] = "Las fechas de salida y regreso son obligatorias.";
    if (empty($telefono) || !preg_match("/^\d{10}$/", $telefono)) $errores[] = "El teléfono debe ser un número válido de 10 dígitos.";
    if (empty($numero_asiento)) $errores[] = "El número de asiento es obligatorio.";

    if (!empty($errores)) {
        echo "Corrija los errores:<br>" . implode("<br>", $errores);
        exit;
    }

    // Obtener el viaje_id desde el formulario
$viaje_id = limpiarEntrada($_POST['viaje_id'] ?? '');

// Verificar que el viaje_id no esté vacío
if (empty($viaje_id)) {
    $_SESSION['error_message'] = "El ID del viaje es obligatorio.";
    header("Location: Comprar.php");
    exit;
}

// Verificar si el viaje existe en la tabla viajes
$stmt = $conn->prepare("SELECT id FROM viajes WHERE id = ?");
$stmt->bind_param("i", $viaje_id);
$stmt->execute();
$stmt->store_result();

// Si no existe el viaje_id, mostrar un mensaje y redirigir a la página del formulario
if ($stmt->num_rows == 0) {
    $_SESSION['error_message'] = "El ID del viaje no es válido.";
    header("Location: Comprar.php");
    exit;
}

$usuario_id = null; // Si no hay usuario logueado

    // Insertar reserva utilizando prepared statements para evitar inyecciones SQL
    $stmt = $conn->prepare(
        "INSERT INTO reservas (nombre, apellido, telefono, email, destino, fecha_salida, fecha_regreso, numero_asiento, comentarios, acepta_terminos, metodo_pago, cuenta, contrasena, usuario_id, viaje_id)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
    );
    
    if ($stmt === false) {
        die("Error al preparar la consulta: " . $conn->error);
    }
    
    $stmt->bind_param(
        "sssssssiissssii",
        $nombre,
        $apellido,
        $telefono,
        $email,
        $destino,
        $fecha_salida,
        $fecha_regreso,
        $numero_asiento,
        $comentarios,
        $acepta_terminos,
        $metodo_pago,
        $cuenta,
        $contrasena,
        $usuario_id, // Asegúrate de que este valor esté definido o sea NULL
        $viaje_id
    );
    if ($stmt->execute()) {
        echo "Reserva realizada con éxito.";
        header("Location: ../service.html");
    } else {
        echo "Error al realizar la reserva: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
}
?>
