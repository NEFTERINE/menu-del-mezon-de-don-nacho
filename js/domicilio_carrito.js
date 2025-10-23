document.addEventListener('DOMContentLoaded', function () {

// js/domicilio_carrito.js - SÓLO CIERRE PARA EL MODAL #subServicio
const modalSubServicio = document.getElementById("subServicio");
const btnAbrirSubServicio = document.getElementById("BtnsubServicio");
const btnCerrarSubServicio = document.querySelector(".cerrarsubServicio");
const modalSeleccion = document.getElementById("subServicio"); // Modal 2
const modalFormulario = document.getElementById("modalServicio"); // Modal 1
const btnAgregar = document.getElementById("btnAgregarNuevaDireccion"); // El nuevo botón

btnAbrirSubServicio.addEventListener('click', function (e) {
    // Previene el comportamiento por defecto del <a> (navegar a #)
    e.preventDefault();
    // Muestra la ventana. Usamos 'flex' porque así la centramos en CSS.
    modalSubServicio.style.display = "flex";
});

// 2. Cerrar el modal al hacer clic en la 'x'
btnCerrarSubServicio.addEventListener('click', function () {
    modalSubServicio.style.display = "none";
});

// 3. Cerrar al hacer clic fuera
window.addEventListener('click', function (event) {
    if (event.target === modalSubServicio) {
        modalSubServicio.style.display = "none";
    }
});

if (btnAgregar && modalSeleccion && modalFormulario) {
        btnAgregar.addEventListener('click', function (e) {
            e.preventDefault();

            // 1. Cierra el modal de selección de dirección
            modalSeleccion.style.display = 'none';

            // 2. Abre el modal de formulario (Modal 1)
            modalFormulario.style.display = 'flex';
        });
    }
});


// 🛑 IMPORTANTE: Elimina el bloque de apertura automática comentado si lo tienes.
// El PHP/JS ahora se encarga de abrirlo.