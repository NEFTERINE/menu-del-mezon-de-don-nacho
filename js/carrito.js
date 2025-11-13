// js/carrito.js - VERSIÓN SILENCIOSA
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
    
    // Cargar estado inicial
    actualizarCarritoUI();
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

function actualizarListContainer(carrito, total, totalCantidad) {
    const carritoDinamico = document.getElementById('carrito-dinamico');
    
    // Detectar si estamos en index.php o carrito.php
    if (!carritoDinamico) {
        return; // Salir si no existe el elemento
    }
    
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

function actualizarCarritoUI() {
    fetch('funciones/obtener_carrito.php')
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            // Actualizar list-container solo si existe (index.php)
            const carritoDinamico = document.getElementById('carrito-dinamico');
            if (carritoDinamico) {
                actualizarListContainer(data.carrito, data.total, data.totalCantidad);
            }
            
            // Actualizar resumen del modal solo si existe (carrito.php)
            const flechaResumen = document.getElementById('flecha-resumen');
            if (flechaResumen) {
                actualizarResumenCuenta(data.carrito, data.total, data.totalCantidad);
            }
            
            // Actualizar contador del header si existe
            if (typeof actualizarContadorHeader === 'function') {
                actualizarContadorHeader(data.totalCantidad);
            }
        }
    })
    .catch(error => {});
}

function actualizarResumenCuenta(carrito, total, totalProductos) {
    // 1. ACTUALIZAR RESUMEN GENERAL
    const flechaResumen = document.getElementById('flecha-resumen');
    if (flechaResumen) {
        const contenido = flechaResumen.querySelector('div');
        if (contenido) {
            const parrafo = contenido.querySelector('p');
            if (parrafo) {
                parrafo.textContent = `${totalProductos} Producto(s) Total $${total.toFixed(2)}MX`;
            }
        }
    }
    
    // 2. ACTUALIZAR BOTÓN DE PEDIR
    const btnPedir = document.getElementById('btn-pedir-local');
    if (btnPedir) {
        btnPedir.textContent = `Pedir $${total.toFixed(2)}MX`;
    }
    
    // 3. ACTUALIZAR DETALLE DE PRODUCTOS
    const detalleProductos = document.getElementById('detalle-productos');
    if (detalleProductos) {
        let tablaHTML = `
            <table>
                <thead>
                    <tr>
                        <td>Resumen de cuenta</td>
                        <td></td>
                    </tr>
                </thead>
                <tbody>
        `;
        
        if (carrito && carrito.length > 0) {
            carrito.forEach(item => {
                const subtotal = item.precio * item.cantidad;
                tablaHTML += `
                    <tr>
                        <td>${item.nombre} x${item.cantidad}</td>
                        <td>$${subtotal.toFixed(2)}</td>
                    </tr>
                `;
            });
            
            tablaHTML += `
                <tr>
                    <td colspan="2"><strong>Total $${total.toFixed(2)}</strong></td>
                </tr>
            `;
        } else {
            tablaHTML += `
                <tr>
                    <td colspan="2">No hay productos en el carrito</td>
                </tr>
            `;
        }
        
        tablaHTML += `</tbody></table>`;
        detalleProductos.innerHTML = tablaHTML;
    }
}

function actualizarContadorHeader(totalCantidad) {
    const contador = document.getElementById('contador-carrito');
    if (contador) {
        contador.textContent = totalCantidad;
        if (totalCantidad > 0) {
            contador.style.display = 'inline-block';
        } else {
            contador.style.display = 'none';
        }
    }
}