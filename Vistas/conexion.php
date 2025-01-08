<?php
$host = 'localhost'; 
$usuario = 'mi_usuario';
$contrasena = 'mi_contrasena_segura';
$base_datos = 'agencia_viajes';

try {
    // Crear una nueva conexión PDO
    $conexion = new PDO("mysql:host=$host;dbname=$base_datos;charset=utf8", $usuario, $contrasena);
    
    // Configurar el modo de error de PDO a excepción
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Configurar el modo de emulación de sentencias preparadas
    $conexion->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    
    // Configurar el modo de atributos para evitar inyecciones SQL
    $conexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
}
?>
