// En cuenta_local.js - usa nombres únicos
const modalLocal = document.getElementById("LocalCuenta");
const btnAbrirLocal = document.getElementById("BtnLocal");
const btnCerrarLocal = document.querySelector(".cerrar-modal");

// Luego usa estos nombres únicos en todo tu código...
if (btnAbrirLocal && modalLocal) {
    btnAbrirLocal.addEventListener('click', function(e) {
        e.preventDefault(); 
        modalLocal.style.display = "flex"; 
    });
}
// ... etc

// 2. Cerrar el modal al hacer clic en la 'x'
if (btnCerrarLocal && modalLocal) {
    btnCerrarLocal.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Cerrando modal");
        modalLocal.style.display = "none";
    });
}

// 3. Cerrar el modal si el usuario hace clic fuera del contenido
if (modalLocal) {
    window.addEventListener('click', function(event) {
        if (event.target === modalLocal) {
            console.log("Clic fuera del modal - cerrando");
            modalLocal.style.display = "none";
        }
    });
}

