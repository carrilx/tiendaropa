let lastScrollTop = 0;  // Variable para almacenar la posición anterior del scroll
const temporada = document.getElementById('temporada');
const header = document.querySelector('header'); // Seleccionamos el header
let isScrolling = false;  // Controla si el scroll está ocurriendo
let timeout = null;  // Variable de temporizador para limitar las ejecuciones

// Función para manejar el evento de scroll
const handleScroll = () => {
    // Solo ejecutamos el código cuando el navegador está listo
    if (!isScrolling) {
        window.requestAnimationFrame(() => {
            let rect = temporada.getBoundingClientRect();
            let alturaPantalla = window.innerHeight;
            let currentScroll = window.pageYOffset || document.documentElement.scrollTop;

            // Lógica para manejar la visibilidad del header
            if (currentScroll > lastScrollTop) {
                // Si el scroll va hacia abajo, ocultamos el header
                header.style.top = "-120px"; // Ajusta según la altura de tu header
            } else {
                // Si el scroll va hacia arriba, mostramos el header
                header.style.top = "0";
            }

            // Lógica para manejar la visibilidad del elemento 'temporada'
            if (currentScroll > lastScrollTop) {
                if (rect.top < alturaPantalla && rect.bottom > 0) {
                    temporada.classList.add('visible');
                }
            } else {
                temporada.classList.remove('visible');
            }

            lastScrollTop = currentScroll <= 0 ? 0 : currentScroll;
            isScrolling = false; 
        });
        isScrolling = true; 
    }
};

window.addEventListener('scroll', () => {
    if (timeout) clearTimeout(timeout);
    timeout = setTimeout(handleScroll, 10);
});


