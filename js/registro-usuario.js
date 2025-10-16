document.addEventListener('DOMContentLoaded', function() {
// En cuenta_local.js - usa nombres únicos
const modalU = document.getElementById("registro-usuario");
const btnAbrirU = document.getElementById("usuario");
const btnCerrarU = document.querySelector(".cerrar-modal");

// Luego usa estos nombres únicos en todo tu código...
if (btnAbrirU && modalU) {
    btnAbrirU.addEventListener('click', function(e) {
        e.preventDefault(); 
        modalU.style.display = "flex"; 
    });
}
// ... etc

// 2. Cerrar el modal al hacer clic en la 'x'
if (btnCerrarU && modalU) {
    btnCerrarU.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Cerrando modal");
        modalU.style.display = "none";
    });
}

// 3. Cerrar el modal si el usuario hace clic fuera del contenido
if (modalU) {
    window.addEventListener('click', function(event) {
        if (event.target === modalU) {
            console.log("Clic fuera del modal - cerrando");
            modalU.style.display = "none";
        }
    });
}

});