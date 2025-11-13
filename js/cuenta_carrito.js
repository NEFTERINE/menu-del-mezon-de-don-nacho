// js/modal_domicilio.js - SOLO para flujo domicilio
document.addEventListener('DOMContentLoaded', function() {
    const modalServicio = document.getElementById("modalServicio");
    const modalSubServicio = document.getElementById("subServicio");
    const modalP = document.getElementById("modalP");

    // Abrir modal automáticamente si hay parámetro en URL
    const urlParams = new URLSearchParams(window.location.search);
    const modalAbrir = urlParams.get('modal_abrir');
    
    if (modalAbrir === 'subServicio' && modalSubServicio) {
        modalSubServicio.style.display = 'flex';
        document.body.style.overflow = 'hidden';
    }

    // Botón cambiar dirección
    const btnAgregarDireccion = document.getElementById("btnAgregarNuevaDireccion");
    if (btnAgregarDireccion && modalSubServicio && modalServicio) {
        btnAgregarDireccion.addEventListener('click', function(e) {
            e.preventDefault();
            modalSubServicio.style.display = 'none';
            modalServicio.style.display = 'flex';
        });
    }

    // Formulario subServicio → modalP
    const formSubServicio = document.querySelector('#subServicio form');
    if (formSubServicio && modalSubServicio && modalP) {
        formSubServicio.addEventListener('submit', function(e) {
            e.preventDefault();
            modalSubServicio.style.display = 'none';
            modalP.style.display = 'flex';
        });
    }
});