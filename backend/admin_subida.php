<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Subir producto</title>
</head>
<body>
  <h1>Subir nuevo producto</h1>
  <form action="subirproducto.php" method="POST" enctype="multipart/form-data">
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" required></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" step="0.01" name="precio" required><br><br>

    <label>Temporada:</label><br>
    <select name="temporada">
      <option value="primavera">Primavera</option>
      <option value="verano">Verano</option>
      <option value="otono">Otoño</option>
      <option value="invierno">Invierno</option>
    </select><br><br>

    <label>Imagen del producto:</label><br>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <button type="submit">Subir producto</button>
  </form>
</body>
</html>
