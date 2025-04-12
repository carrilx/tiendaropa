<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/estilo.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">
    <script defer src="script/carrito.js"></script>
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

    <main id="maincarrito">
        <div class="carrito-container">
            <h1>Tu Carrito de Compras</h1>
            <div id="carritoItems" class="carrito-items">

            </div>

            <div id="totalCarrito" class="total-carrito">

                <span>Total: $<span id="totalPrice">0.00</span></span>
            </div>

            <button id="checkoutButton">Realizar Compra</button>
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
        </div>
    </footer>
</body>
</html>
