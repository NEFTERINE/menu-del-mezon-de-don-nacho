document.addEventListener('DOMContentLoaded', () => {
    const botones = document.querySelectorAll('.agregarCarrito');

    botones.forEach(boton => {
        boton.addEventListener('click', async () => {
            const id = boton.dataset.id;
            const nombre = boton.dataset.nombre;
            const precio = boton.dataset.precio;

            // Puedes pedir cantidad si la manejas aparte, aquí lo dejamos en 1 por defecto
            const cantidad = 1;
            // Enviar por POST al backend
            const response = await fetch('funciones/agregar_carrito.php', {
                method: 'POST',
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                body: new URLSearchParams({
                    id,
                    nombre,
                    precio,
                    cantidad
                })
            });

            const data = await response.json();
            if (data.success) {
                alert(`Se agregó "${nombre}" al carrito.`);
                console.log(data.carrito); // ver en consola el contenido de la sesión
            } else {
                alert("Ocurrió un error al agregar el platillo.");
            }
        });
    });
});
