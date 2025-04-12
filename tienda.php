<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script defer src="script/tienda.js"></script>
</head>
<body>
    <header>
        <div>
            <img src="img/pngegg.png" alt="">
        </div>
        <nav>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="tienda.php">TIENDA</a></li>
                <li><a href="">NOSOTROS</a></li>
                <li><a href="">CONTACTO</a></li>
                <li><a href="carrito.php">CARRITO</a></li>
            </ul>
        </nav>
    </header>
    <main>

        <div class="carousel-container">
            <div class="carousel-slides" id="slides">
              <div class="carousel-slide"><img src="img/carrusel1.webp" alt="Imagen 1"></div>
              <div class="carousel-slide"><img src="img/carrusel5.jpg" alt="Imagen 2"></div>
              <div class="carousel-slide"><img src="img/carrusel3.webp" alt="Imagen 3"></div>
            </div>
            <button class="carousel-btn prev" onclick="moverSlide(-1)">❮</button>
            <button class="carousel-btn next" onclick="moverSlide(1)">❯</button>
        </div>

        <div class="catalogo-container">
            <div class="barra-superior">
              <input type="text" id="busqueda" placeholder="Buscar en el catálogo...">
              <button class="menu-hamburguesa" id="menuToggle">☰ Filtros</button>
            </div>

            <div class="filtros" id="filtrosMenu">
                <h3>Filtrar por temporada:</h3>
                <label><input type="checkbox" name="temporada" value="primavera" id="primavera" onchange="filtrarProductos()"> Primavera</label>
                <label><input type="checkbox" name="temporada" value="verano" id="verano" onchange="filtrarProductos()"> Verano</label>
                <label><input type="checkbox" name="temporada" value="otono" id="otono" onchange="filtrarProductos()"> Otoño</label>
                <label><input type="checkbox" name="temporada" value="invierno" id="invierno" onchange="filtrarProductos()"> Invierno</label>
            </div>

            <div class="catalogo-items">
                
                <?php

                   
                    $conn = new mysqli("localhost", "root", "", "tiendaropa");
                    $result = $conn->query("SELECT * FROM productos");

                    while ($row = $result->fetch_assoc()) {
                        echo '<div class="producto" data-id="' . $row['id'] . '" data-temporada="' . $row['temporada'] . '">';
                        echo '<img src="' . $row['imagen'] . '" alt="' . $row['nombre'] . '">';
                        echo '<h4>' . $row['nombre'] . '</h4>';
                        echo '<p>' . $row['descripcion'] . '</p>';
                        echo '<span>$' . $row['precio'] . '</span>';
                        echo '<button onclick="agregarAlCarrito(' . $row['id'] . ', \'' . $row['nombre'] . '\', ' . $row['precio'] . ')">Agregar al carrito</button>';
                        echo '</div>';
                    }
                    $conn->close();

                ?>
                <div class="producto" data-temporada="primavera">
                    <img src="img/zapatillas.webp" alt="Zapatillas deportivas">
                    <h4>Zapatillas deportivas</h4>
                    <p>Ligeras y frescas para la primavera</p>
                    <span>$25.99</span>
                </div>
    
                <div class="producto" data-temporada="verano">
                    <img src="https://via.placeholder.com/200x200?text=Pantalones" alt="Pantalones">
                    <h4>Pantalones cortos</h4>
                    <p>Perfectos para días calurosos</p>
                    <span>$19.99</span>
                </div>
    
                <div class="producto" data-temporada="otono">
                    <img src="https://via.placeholder.com/200x200?text=Sueter" alt="Suéter de lana">
                    <h4>Suéter de lana</h4>
                    <p>Ideal para las noches frescas de otoño</p>
                    <span>$39.99</span>
                </div>
    
                <div class="producto" data-temporada="invierno">
                    <img src="https://via.placeholder.com/200x200?text=Abrigo" alt="Abrigo">
                    <h4>Abrigo de lana</h4>
                    <p>Te mantiene caliente en invierno</p>
                    <span>$69.00</span>
                </div>

                
            </div>
        </div>
    </main>

    <footer>
        <div id="footer-content">
            <p>&copy; 2023 Tu Tienda de Ropa. Por Xaime Carril</p>
            <div class="social-media">
                <i class="fa-brands fa-instagram"></i>
                <i class="fa-brands fa-square-facebook"></i>
                <i class="fa-brands fa-twitter"></i>
            </div>
        </div>
        <div class="footer-links">
            <a href="#">Política de privacidad</a>
            <a href="#">Términos de servicio</a>
            <a href="#">Contacto</a>
            <a href="backend/login_admin.php">Admin</a>
        </div>
    </footer>

    <script src="script/filtros.js"></script>
</body>
</html>
