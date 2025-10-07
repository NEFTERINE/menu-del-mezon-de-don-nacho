// Referencias a los elementos
const botonAbrirOption = document.getElementById('abrirModalOption'); // El div de la tarjeta del producto
const modalOption = document.getElementById('ventanaoption'); // El modal
const botonCerrarOption = modalOption ? modalOption.querySelector('.cerrar-modal') : null; // El botón 'x'

// 1. Abrir el modal
if (botonAbrirOption) {
    botonAbrirOption.addEventListener('click', () => {
        // Muestra el modal
        modalOption.style.display = 'flex'; 
    });
}

// 2. Cerrar el modal con la 'x'
if (botonCerrarOption) {
    botonCerrarOption.addEventListener('click', () => {
        // Oculta el modal
        modalOption.style.display = 'none';
    });
}

// 3. Cerrar al hacer clic fuera del contenido (en el fondo oscuro)
window.addEventListener('click', (event) => {
    if (event.target === modalOption) {
        modalOption.style.display = 'none';
    }
});