document.addEventListener('DOMContentLoaded', function() {
// En cuenta_local.js - usa nombres únicos
const modalP = document.getElementById("registro-platillo");
const btnAbrirP = document.getElementById("platillo");
const btnCerrarP = document.querySelector(".cerrar-platillo");

// Luego usa estos nombres únicos en todo tu código...
if (btnAbrirP && modalP) {
    btnAbrirP.addEventListener('click', function(e) {
        e.preventDefault(); 
        modalP.style.display = "flex"; 
    });
}
// ... etc

// 2. Cerrar el modal al hacer clic en la 'x'
if (btnCerrarP && modalP) {
    btnCerrarP.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Cerrando modal");
        modalP.style.display = "none";
    });
}

// 3. Cerrar el modal si el usuario hace clic fuera del contenido
if (modalP) {
    window.addEventListener('click', function(event) {
        if (event.target === modalP) {
            console.log("Clic fuera del modal - cerrando");
            modalP.style.display = "none";
        }
    });
}

});