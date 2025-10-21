
// // Esto hará que el modal de CUENTA esté abierto al cargar la página
// window.addEventListener('DOMContentLoaded', function() {
//     if (modalCuenta) {
//         modalCuenta.style.display = "flex";
//     }
// });
// js/formulario_carrito.js - SOLO CONTROL DE MODALS
const modalServicio = document.getElementById("modalServicio");
const btnAbrirCuenta = document.getElementById("abrirModalBtnServicio"); 
const btnCerrarCuenta = document.querySelector(".cerrarModalServicio");

// ===============================================
// 1. ABRIR PRIMER MODAL
// ===============================================
if (btnAbrirCuenta) {
    btnAbrirCuenta.addEventListener('click', function(e) {
        e.preventDefault(); 
        modalServicio.style.display = "flex"; 
    });
}

if (btnCerrarCuenta) {
    btnCerrarCuenta.addEventListener('click', function() {
        modalServicio.style.display = "none";
    });
}

if (modalServicio) {
    window.addEventListener('click', function(event) {
        if (event.target === modalServicio) {
            modalServicio.style.display = "none";
        }
    });
}