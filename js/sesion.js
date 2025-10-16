// Este es el único cambio que garantiza que el botón y el modal existan
document.addEventListener('DOMContentLoaded', function() { 
    
    // Obtén los elementos que usaremos
    const modal = document.getElementById("sesion-modal"); // Asegúrate de que este es el ID del modal de sesión
    const btnA = document.getElementById("sesionBtn");     // Asegúrate de que este es el ID del botón de apertura
    const btnC = document.querySelector(".cerrar-modal");

    // 1. Lógica de Apertura
    if (btnA && modal) { // La comprobación evita el error si es null
        btnA.addEventListener('click', function(e) {
            e.preventDefault(); 
            modal.style.display = "flex"; 
        });
    } else {
        // Usa la consola (F12) para ver si hay error de Null
        console.error("DEBUG: El botón de abrir (#sesionBtn) o el modal (#sesion-modal) no se encontró.");
    }
    
    // 2. Lógica de Cierre
    if (btnC && modal) {
        btnC.addEventListener('click', function() {
            modal.style.display = "none";
        });
    }

    // 3. Cerrar al hacer clic fuera
    if (modal) {
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                modal.style.display = "none";
            }
        });
    }
});
// Fin de la función DOMContentLoaded