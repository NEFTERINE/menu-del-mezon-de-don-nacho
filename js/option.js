document.addEventListener('DOMContentLoaded', function() {
    const modalOption = document.getElementById('ventanaoption');
    const botonesInfo = document.querySelectorAll(".abrir-modal-option");
    const botonCerrarOption = modalOption.querySelector('.cerrar-opcion');

    botonesInfo.forEach(boton => {
        boton.addEventListener('click', function(e) {
            e.preventDefault();
            const id = this.getAttribute('data-id');

            fetch(`funciones/obtenerPlatillo.php?id=${id}`)
                .then(response => response.json())
                .then(data => {
                    document.getElementById("nomPlato").textContent = data.nom_platillo;
                    document.getElementById("descPlato").textContent = data.descripcion_platillo;
                    document.getElementById("precioPlato").textContent = `$${data.precio_platillo}`;
                    document.getElementById("imgPlato").src = "imagenes/" + data.foto_platillo;
                    modalOption.style.display = "flex";
                })
                .catch(err => console.error("Error al obtener datos:", err));
        });
    });

    // Cerrar modal
    botonCerrarOption.addEventListener('click', () => modalOption.style.display = "none");

    // Cerrar clic fuera
    window.addEventListener('click', e => {
        if (e.target === modalOption) modalOption.style.display = "none";
    });
});
