document.addEventListener('DOMContentLoaded', function() {
    const inputsCantidad = document.querySelectorAll('.cantidad-control input');

    inputsCantidad.forEach(input => {
        input.addEventListener('change', async function() {
            const id_platillo = this.dataset.id;
            const nueva_cantidad = parseInt(this.value);

//             if (nueva_cantidad < 1) {
//                 alert('La cantidad mínima es 1.');
//                 this.value = 1;
//                 return;
//             }
// debugger
            try {
                const response = await fetch('funciones/actualizar_carrito.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded'
                    },
                    body: new URLSearchParams({
                        id: id_platillo,
                        cantidad: nueva_cantidad
                    })
                });

                const data = await response.json();

                if (data.success && data.nuevo_total !== undefined) {
                    const totalElement = document.querySelector('.c_tot');
                    if (totalElement) totalElement.textContent = 'MXN $' + data.nuevo_total;
                } else {
                    console.error('Respuesta inválida del servidor:', data);
                }

            } catch (error) {
                console.error('Error al actualizar el carrito:', error);
            }
        });
    });
});
