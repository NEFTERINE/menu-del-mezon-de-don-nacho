const modalOption = document.getElementById('ventanaoption');
const botonCerrarOption = modalOption.querySelector('.cerrar-opcion');

// 1. Delegación de eventos - más eficiente
document.addEventListener('click', (event) => {
    if (event.target.classList.contains('abrir-modal-option')) {
        modalOption.style.display = 'flex';
    }
});

// 2. Cerrar el modal con la 'x'
if (botonCerrarOption) {
    botonCerrarOption.addEventListener('click', () => {
        modalOption.style.display = 'none';
    });
}

// 3. Cerrar al hacer clic fuera del contenido
window.addEventListener('click', (event) => {
    if (event.target === modalOption) {
        modalOption.style.display = 'none';
    }
});