<?php
$conn = new mysqli("localhost", "root", "", "tiendaropa");
$result = $conn->query("SELECT * FROM productos");

while ($row = $result->fetch_assoc()) {
  echo '<div class="producto" data-temporada="' . $row['temporada'] . '">';
  echo '<img src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
  echo '<h4>' . $row['nombre'] . '</h4>';
  echo '<p>' . $row['descripcion'] . '</p>';
  echo '<span>$' . $row['precio'] . '</span>';
  echo '</div>';
}
$conn->close();
?>
