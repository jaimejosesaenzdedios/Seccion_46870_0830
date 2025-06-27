<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "autofinder");

// Verificar conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recibir datos del formulario
$nombre     = $_POST['nombre'];
$apellido   = $_POST['apellido'];
$correo     = $_POST['correo'];
$usuario    = $_POST['usuario'];
$contrasena = password_hash($_POST['contrasena'], PASSWORD_DEFAULT); // Cifrado seguro
$celular    = $_POST['celular'];

// Consulta para insertar
$sql = "INSERT INTO usuarios (nombre, apellido, correo, usuario, contrasena, celular)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = $conexion->prepare($sql);
$stmt->bind_param("ssssss", $nombre, $apellido, $correo, $usuario, $contrasena, $celular);

if ($stmt->execute()) {
    echo "<script>alert('Registro exitoso'); window.location.href='index.html';</script>";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conexion->close();
?>