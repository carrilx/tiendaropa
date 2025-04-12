<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Login Administrador</title>
</head>
<body>
  <h2>Acceso administrador</h2>
  <form action="procesar_login.php" method="POST">
    <label>Usuario:</label>
    <input type="text" name="usuario" required><br><br>

    <label>Contraseña:</label>
    <input type="password" name="clave" required><br><br>

    <button type="submit">Ingresar</button>
  </form>
</body>
</html>
    