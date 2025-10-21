document.addEventListener('DOMContentLoaded', function() {

    // Obtén los elementos que usaremos
    const MC = document.getElementById("registro-categoria");
    const AC = document.getElementById("cate");
    const CC = document.querySelector(".cerrar-categoria"); 

    // 1. Abrir el modal al hacer clic en el botón
    if (AC && MC) {
        AC.addEventListener('click', function(e) {
            e.preventDefault(); 
            MC.style.display = "flex"; 
            console.log("Modal de Categoría abierto.");
        });
    }

    // 2. Cerrar el modal al hacer clic en la 'x'
    if (CC && MC) {
        CC.addEventListener('click', function(e) {
            e.preventDefault();
            console.log("Cerrando modal");
            MC.style.display = "none";
        });
    }

    // 3. Cerrar el modal si el usuario hace clic fuera del contenido
    if (MC) {
        window.addEventListener('click', function(event) {
            if (event.target === MC) {
                console.log("Clic fuera del modal - cerrando");
                MC.style.display = "none";
            }
        });
    }
});