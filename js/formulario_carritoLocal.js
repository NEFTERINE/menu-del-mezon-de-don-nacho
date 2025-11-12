document.addEventListener("DOMContentLoaded", function() {
    const modalServicio = document.getElementById("modalServicioLocal");
    const btnAbrirCuenta = document.getElementById("BtnModalLocal"); 
    const btnCerrarCuenta = document.querySelector(".cerrarModalServicioLocal");

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
});
