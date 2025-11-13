// document.addEventListener('DOMContentLoaded', function() {
//     const botonesAgregar = document.querySelectorAll('.agregarCarrito');
    
//     botonesAgregar.forEach(boton => {
//         boton.addEventListener('click', function() {
//             const id = this.getAttribute('data-id');
//             const nombre = this.getAttribute('data-nombre');
//             const precio = parseFloat(this.getAttribute('data-precio'));
            
//             agregarAlCarrito(id, nombre, precio);
//         });
//     });
// });

// function agregarAlCarrito(id, nombre, precio) {
//     // Enviar directamente al PHP para guardar en sesión
//     fetch('funciones/agregar_carrito.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json',
//         },
//         body: JSON.stringify({ 
//             id: id,
//             nombre: nombre,
//             precio: precio
//         })
//     })
//     .catch(error => {
//         console.error('Error:', error);
//     });
// }