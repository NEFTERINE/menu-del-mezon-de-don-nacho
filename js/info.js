// js/option.js
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById("ventanaoption");
    const btnCerrar = document.getElementById("cerrar-modal");

    // 1. Abrir modal al hacer clic en cualquier imagen de platillo
    document.querySelectorAll('.abrir-modal-option').forEach(imagen => {
        imagen.addEventListener('click', function() {
            const platilloId = this.getAttribute('data-id');
            abrirModalPlatillo(platilloId);
        });
    });

    // 2. Cerrar modal al hacer clic en la 'x'
    btnCerrar.addEventListener('click', function() {
        modal.style.display = "none";
    });

    // 3. Cerrar modal si el usuario hace clic fuera del contenido
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = "none";
        }
    });

    // Función para abrir el modal con los datos del platillo
    function abrirModalPlatillo(platilloId) {
        // Mostrar estado de carga
        document.getElementById('nomPlato').textContent = 'Cargando...';
        document.getElementById('descPlato').textContent = '';
        document.getElementById('precioPlato').textContent = '';

        // Obtener datos del platillo via AJAX
        fetch(`funciones/obtener_platillo.php?id=${platilloId}`)
        .then(response => response.json())
        .then(data => {
            if (data.success && data.platillo) {
                const platillo = data.platillo;
                
                // Actualizar el modal con los datos
                document.getElementById('imgPlato').src = 'imagenes/' + platillo.foto_platillo;
                document.getElementById('imgPlato').alt = platillo.nom_platillo;
                document.getElementById('nomPlato').textContent = platillo.nom_platillo;
                document.getElementById('descPlato').textContent = platillo.descripcion_platillo;
                document.getElementById('precioPlato').textContent = `$${platillo.precio_platillo}`;
                
            } else {
                document.getElementById('nomPlato').textContent = 'Error al cargar el platillo';
                document.getElementById('descPlato').textContent = data.error || 'Platillo no encontrado';
            }
        })
        .catch(error => {
            console.error('Error:', error);
            document.getElementById('nomPlato').textContent = 'Error de conexión';
            document.getElementById('descPlato').textContent = 'No se pudo cargar la información';
        })
        .finally(() => {
            // Mostrar el modal
            modal.style.display = "flex";
        });
    }
});