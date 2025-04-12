<?php
session_start();
$conn = new mysqli("localhost", "root", "", "tiendaropa");

if ($conn->connect_error) {
  die("Conexión fallida: " . $conn->connect_error);
}

$usuario = $_POST['usuario'];
$clave = $_POST['clave'];

$sql = "SELECT * FROM administradores WHERE usuario = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $usuario);
$stmt->execute();
$resultado = $stmt->get_result();

if ($resultado->num_rows === 1) {
  $admin = $resultado->fetch_assoc();
  if (password_verify($clave, $admin['clave'])) {
    $_SESSION['admin'] = $admin['usuario'];
    header("Location: admin_subida.php");
    exit();
  } else {
    echo "Contraseña incorrecta.";
  }
} else {
  echo "Usuario no encontrado.";
}

$conn->close();
?>
