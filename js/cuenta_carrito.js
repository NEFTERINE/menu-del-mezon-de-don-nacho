// ===============================================
// 1. DEFINICIÓN DE ELEMENTOS DOM
// ===============================================

const modalCuenta = document.getElementById("modalP"); // Cambiado a "modalP" que es el ID real en tu HTML
const btnAbrirCuenta = document.getElementById("BtnCuenta"); 
const modalDireccion = document.getElementById("subServicio"); // Este es otro modal
const btnCerrarCuenta = document.querySelector(".cerrar-modal"); // Para el modal de cuenta

// ===============================================
// 2. APERTURA AUTOMÁTICA DEL MODAL DE CUENTA
// ===============================================

// Esto hará que el modal de CUENTA esté abierto al cargar la página
window.addEventListener('DOMContentLoaded', function() {
    if (modalCuenta) {
        modalCuenta.style.display = "flex";
    }
});

// ===============================================
// 3. LÓGICA DE APERTURA MANUAL (Si hay otro botón para abrir cuenta)
// ===============================================

if (btnAbrirCuenta && modalCuenta) {
    btnAbrirCuenta.addEventListener('click', function(e) {
        e.preventDefault(); 
        modalCuenta.style.display = "flex"; 
    });
}

// ===============================================
// 4. LÓGICA DE CIERRE MANUAL (Botón 'X' - Cuenta)
// ===============================================

if (btnCerrarCuenta && modalCuenta) {
    btnCerrarCuenta.addEventListener('click', function() {
        modalCuenta.style.display = "none";
    });
}
