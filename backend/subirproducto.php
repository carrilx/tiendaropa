<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "tiendaropa";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$temporada = $_POST['temporada'];

$directorio = "../img/productos/";

// Verifica si la carpeta existe, si no, la crea
if (!file_exists($directorio)) {
    mkdir($directorio, 0777, true);  // Crea la carpeta si no existe
}

$archivo = $directorio . basename($_FILES["imagen"]["name"]);

if (move_uploaded_file($_FILES["imagen"]["tmp_name"], $archivo)) {
    $rutaImagen = "img/productos/" . basename($_FILES["imagen"]["name"]);

    $sql = "INSERT INTO productos (nombre, descripcion, precio, temporada, imagen)
            VALUES (?, ?, ?, ?, ?)";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdss", $nombre, $descripcion, $precio, $temporada, $rutaImagen);
    $stmt->execute();

    // Redirige a la página de tienda después de subir el producto
    header("Location: ../tienda.php");  // Cambia 'tienda.php' a la página que desees
    exit();  // Es importante llamar a exit() para evitar que el código posterior se ejecute
} else {
    echo "Error al subir la imagen.";
}

$conn->close();
?>
