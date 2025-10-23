document.addEventListener('DOMContentLoaded', function() {

    // Obtén los elementos que usaremos
    const modal = document.getElementById("r-categoria");
    const btnAbrir = document.getElementById("categoria");
    // Selecciona el cerrar-modal dentro del modal específico
    const btnCerrar = document.querySelector("#r-categoria .cerrar-modal"); 

    // 1. Abrir el modal al hacer clic en el botón
    if (btnAbrir && modal) {
        btnAbrir.addEventListener('click', function(e) {
            e.preventDefault(); 
            modal.style.display = "flex"; 
            console.log("Modal de Categoría abierto.");
        });
    }

    // 2. Cerrar el modal al hacer clic en la 'x'
    if (btnCerrar && modal) {
        btnCerrar.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Cerrando modal");
            modal.style.display = "none";
        });
    }

    // 3. Cerrar el modal si el usuario hace clic fuera del contenido
    if (modal) {
        window.addEventListener('click', function(event) {
            if (event.target === modal) {
                console.log("Clic fuera del modal - cerrando");
                modal.style.display = "none";
            }
        });
    }
});