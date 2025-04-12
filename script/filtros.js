window.onload = function() {
    // Leer el parámetro 'temporada' de la URL
    var urlParams = new URLSearchParams(window.location.search);
    var temporada = urlParams.get('temporada');

    // Marcar el checkbox correspondiente según la temporada en la URL
    if (temporada) {
        document.getElementById(temporada).checked = true;
    }

    // Si el parámetro 'temporada' está presente, filtrar los productos
    filtrarProductos();
}

// Filtrar productos según las temporadas seleccionadas
function filtrarProductos() {
    var checkboxes = document.querySelectorAll('input[name="temporada"]:checked');
    var temporadasSeleccionadas = [];
    checkboxes.forEach(function(checkbox) {
        temporadasSeleccionadas.push(checkbox.value);
    });

    var productos = document.querySelectorAll('.producto');
    productos.forEach(function(producto) {
        var temporadaProducto = producto.getAttribute('data-temporada');
        if (temporadasSeleccionadas.length === 0 || temporadasSeleccionadas.includes(temporadaProducto)) {
            producto.style.display = 'block';
        } else {
            producto.style.display = 'none';
        }
    });
}