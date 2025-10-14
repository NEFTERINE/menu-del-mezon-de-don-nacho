const modal = document.getElementById("subServicio");
const btnAbrir = document.getElementById("BtnsubServicio"); 
const btnCerrar = document.querySelector(".cerrarsubServicio");
// 1. Abrir el modal al hacer clic en el botón de servicio
if (btnAbrir) {
    btnAbrir.addEventListener('click', function(e) {
        // Previene el comportamiento por defecto del <a> (navegar a #)
        e.preventDefault(); 
        // Muestra la ventana. Usamos 'flex' porque así la centramos en CSS.
        modal.style.display = "flex"; 
    });
}
// 2. Cerrar el modal al hacer clic en la 'x'
btnCerrar.addEventListener('click', function() {
    modal.style.display = "none";
});
// 3. Cerrar el modal si el usuario hace clic fuera del contenido
window.addEventListener('click', function(event) {
    // Si el clic ocurrió directamente sobre el fondo del modal (el elemento 'modal')
    if (event.target === modal) {
        modal.style.display = "none";
    }
});