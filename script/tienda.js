let index = 0;
const slides = document.getElementById("slides");
const totalSlides = slides.children.length;

function moverSlide(direccion) {
  index += direccion;
  if (index < 0) index = totalSlides - 1;
  if (index >= totalSlides) index = 0;
  slides.style.transform = `translateX(-${index * 100}%)`;
}

// uto-play: cambia cada 5 segundos (5000 ms)
setInterval(() => {
  moverSlide(1);
}, 5000);

// Menú hamburguesa para los filtros
const menuToggle = document.getElementById('menuToggle');
const filtrosMenu = document.getElementById('filtrosMenu');

// Mostrar/ocultar el menú de filtros al hacer clic
menuToggle.addEventListener('click', () => {
  filtrosMenu.style.display = filtrosMenu.style.display === 'block' ? 'none' : 'block';
});

// Filtrar productos según la temporada seleccionada
const productos = document.querySelectorAll('.producto');
const checkboxes = filtrosMenu.querySelectorAll('input[type="checkbox"]');

checkboxes.forEach(checkbox => {
  checkbox.addEventListener('change', () => {
    const seleccionados = Array.from(checkboxes)
      .filter(cb => cb.checked)
      .map(cb => cb.value); // Obtener las temporadas seleccionadas

    productos.forEach(producto => {
      const temporada = producto.dataset.temporada;
      if (seleccionados.length === 0 || seleccionados.includes(temporada)) {
        producto.style.display = 'block';
      } else {
        producto.style.display = 'none';
      }
    });
  });
});




// Función para agregar un producto al carrito
function agregarAlCarrito(id, nombre, precio) {
  let carrito = JSON.parse(localStorage.getItem('cart')) || [];

  // Verificar si el producto ya existe en el carrito
  let productoExistente = carrito.find(item => item.id === id);

  if (productoExistente) {

      productoExistente.cantidad += 1;
  } else {

      carrito.push({
          id: id,
          nombre: nombre,
          precio: precio,
          cantidad: 1
      });
  }

  // Guardar el carrito en el localStorage
  localStorage.setItem('cart', JSON.stringify(carrito));
  alert('Producto agregado al carrito');
}
