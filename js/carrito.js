// js/carrito.js - ARCHIVO ÚNICO
document.addEventListener('DOMContentLoaded', function() {
    
    // Escuchar clics en iconos de agregar
    document.querySelectorAll('.agregarCarrito').forEach(function(icono) {
        icono.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const id = this.getAttribute('data-id');
            const nombre = this.getAttribute('data-nombre');
            const precio = this.getAttribute('data-precio');
            
            agregarProducto(id, nombre, precio, this);
        });
    });
});



function agregarProducto(id, nombre, precio, elemento) {
    // Guardar estado original
    const originalHTML = elemento.innerHTML;
    const originalTitle = elemento.getAttribute('title');
    
    // Feedback visual inmediato
    elemento.innerHTML = '<i class="bi bi-check-lg"></i>';
    elemento.style.color = '#28a745';
    elemento.setAttribute('title', 'Agregado!');
    elemento.style.pointerEvents = 'none';
    
    // Enviar al servidor
    fetch('funciones/agregar_carrito.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            id: id,
            nombre: nombre,
            precio: precio
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar el list-container dinámicamente
            actualizarCarritoUI();
            
            // Mostrar notificación
            mostrarNotificacion('✅ Producto agregado al carrito');
        } else {
            mostrarNotificacion('❌ Error: ' + data.message);
            resetearIcono(elemento, originalHTML, originalTitle);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        mostrarNotificacion('❌ Error de conexión');
        resetearIcono(elemento, originalHTML, originalTitle);
    })
    .finally(() => {
        // Resetear después de 2 segundos (solo si fue éxito)
        if (elemento.style.pointerEvents === 'none') {
            setTimeout(() => {
                resetearIcono(elemento, originalHTML, originalTitle);
            }, 2000);
        }
    });
}

function resetearIcono(elemento, html, title) {
    elemento.innerHTML = html;
    elemento.style.color = '';
    elemento.setAttribute('title', title);
    elemento.style.pointerEvents = 'auto';
}

function actualizarCarritoUI() {
    // Hacer una petición para obtener el carrito actualizado
    fetch('funciones/obtener_carrito.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            actualizarListContainer(data.carrito, data.total, data.totalCantidad);
        }
    })
    .catch(error => console.error('Error:', error));
}

function actualizarListContainer(carrito, total, totalCantidad) {
    const carritoDinamico = document.getElementById('carrito-dinamico');
    const listContainer = carritoDinamico.querySelector('.list-container');
    
    if (totalCantidad > 0) {
        // Si hay productos, actualizar o crear el container
        const nuevoHTML = `
            <div class="list-container">
                <ul class="list">
                    <li class="list-group-item">
                        <div class="product-info">
                            <div class="product-name">${totalCantidad} ${totalCantidad > 1 ? "Productos" : "Producto"}</div>
                            <span class="bidge">$${total.toFixed(2)}</span>
                            <a href="carrito.php" class="action-button">Ver pedido</a>
                        </div>
                    </li>
                </ul>
            </div>
        `;
        
        carritoDinamico.innerHTML = nuevoHTML;
    } else {
        // Si no hay productos, mostrar vacío pero oculto
        carritoDinamico.innerHTML = `
            <div class="list-container" style="display: none;">
                <ul class="list">
                    <li class="list-group-item">
                        <div class="product-info">
                            <div class="product-name">0 Productos</div>
                            <span class="bidge">$0.00</span>
                            <a href="carrito.php" class="action-button">Ver pedido</a>
                        </div>
                    </li>
                </ul>
            </div>
        `;
    }
}

function mostrarNotificacion(mensaje) {
    const notificacion = document.createElement('div');
    notificacion.textContent = mensaje;
    notificacion.style.cssText = `
        position: fixed;
        top: 20px;
        right: 20px;
        background: #28a745;
        color: white;
        padding: 12px 20px;
        border-radius: 5px;
        z-index: 10000;
        font-weight: bold;
        box-shadow: 0 4px 12px rgba(0,0,0,0.3);
    `;
    
    document.body.appendChild(notificacion);
    
    setTimeout(() => {
        notificacion.remove();
    }, 3000);
}

// Cargar carrito al iniciar la página
function actualizarCarritoUI() {
    fetch('funciones/obtener_carrito.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            actualizarListContainer(data.carrito, data.total, data.totalCantidad);
            
            // También actualizar el contador en el header si existe
            actualizarContadorHeader(data.totalCantidad);
        }
    })
    .catch(error => console.error('Error:', error));
}

