// Función global para abrir el modal con datos
function abrirModalEditar(pk_usuario, correo) {
    console.log("Datos recibidos:", pk_usuario, correo);
    
    // Verificar que los elementos existen
    const modalU = document.getElementById("editar-usuario");
    const campoPk = document.getElementById("pk_usuario");
    const campoEmail = document.getElementById("email");
    const campoPassword = document.getElementById("password");
    
    console.log("Elementos encontrados:", {
        modal: modalU,
        pk: campoPk,
        email: campoEmail,
        password: campoPassword
    });
    
    if (campoPk && campoEmail) {
        // Llenar el formulario con los datos
        campoPk.value = pk_usuario;
        campoEmail.value = correo;
        
        if (campoPassword) {
            campoPassword.value = '';
        }
        
        // Mostrar el modal
        if (modalU) {
            modalU.style.display = "flex";
            console.log("Modal mostrado");
        } else {
            console.error("No se encontró el modal");
        }
    } else {
        console.error("No se encontraron los campos del formulario");
    }
}

document.addEventListener('DOMContentLoaded', function() {
    const modalU = document.getElementById("editar-usuario");
    const btnCerrarU = document.querySelector(".cerrar-Eusuario");

    console.log("DOM cargado - Modal:", modalU);

    // Cerrar el modal al hacer clic en la 'x'
    if (btnCerrarU && modalU) {
        btnCerrarU.addEventListener('click', function() {
            modalU.style.display = "none";
        });
    }

    // Cerrar el modal si el usuario hace clic fuera del contenido
    if (modalU) {
        window.addEventListener('click', function(event) {
            if (event.target === modalU) {
                modalU.style.display = "none";
            }
        });
    }
});