<?php
$conn = new mysqli("localhost", "root", "", "tiendaropa");

$usuario = "admin";
$clave = password_hash("1234", PASSWORD_DEFAULT); // 👈 clave segura

$sql = "INSERT INTO administradores (usuario, clave) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $usuario, $clave);
$stmt->execute();

echo "Admin creado";
?>