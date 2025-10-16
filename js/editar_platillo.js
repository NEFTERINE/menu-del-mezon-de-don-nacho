document.addEventListener('DOMContentLoaded', function() {
// En cuenta_local.js - usa nombres únicos
const modal = document.getElementById("editar-platillo");
const btnAbrir = document.getElementById("editar");
const btnCerrar = document.querySelector(".cerrar-modal");

// Luego usa estos nombres únicos en todo tu código...
if (btnAbrir && modal) {
    btnAbrir.addEventListener('click', function(e) {
        e.preventDefault(); 
        modal.style.display = "flex"; 
    });
}
// ... etc

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