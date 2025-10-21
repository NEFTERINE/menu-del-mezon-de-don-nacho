// Este es el único cambio que garantiza que el botón y el modal existan
document.addEventListener('DOMContentLoaded', function() {
    
    // Obtén los elementos que usaremos
    const modal = document.getElementById("lista-pedidos");
    const btnA = document.getElementById("lista-ped");     
    const btnC = document.querySelector(".cerrar-lista-pedidos");

    // 1. Lógica de Apertura
    if (btnA && modal) {
        btnA.addEventListener('click', function(e) {
            e.preventDefault(); 
            modal.style.display = "flex"; 
        });
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