window.onload = function() {
    mostrarCarrito();
};


function mostrarCarrito() {
    const carrito = JSON.parse(localStorage.getItem('cart')) || [];
    const carritoItems = document.getElementById('carritoItems');
    const totalPriceElement = document.getElementById('totalPrice');
    let total = 0;

    carritoItems.innerHTML = ''; // Limpiar los productos antes de mostrar
    carrito.forEach(item => {
        const productDiv = document.createElement('div');
        productDiv.classList.add('producto-carrito');

        // Crear el contenido del producto
        productDiv.innerHTML = `
            <img src="img/zapatillas.webp" alt="${item.nombre}" />
            <div class="producto-info">
                <h4>${item.nombre}</h4>
                <span>$${item.precio}</span>
                <p>Cantidad: ${item.cantidad}</p>
            </div>
            <button onclick="eliminarProducto(${item.id})">Eliminar</button>
        `;

        // Añadir el producto al contenedor
        carritoItems.appendChild(productDiv);

        // Calcular el total
        total += item.precio * item.cantidad;
    });

    // Mostrar el total
    totalPriceElement.textContent = total.toFixed(2);
}

// Función para eliminar un producto del carrito
function eliminarProducto(productId) {
    let carrito = JSON.parse(localStorage.getItem('cart')) || [];
    carrito = carrito.filter(item => item.id !== productId);
    localStorage.setItem('cart', JSON.stringify(carrito));
    mostrarCarrito();
}
