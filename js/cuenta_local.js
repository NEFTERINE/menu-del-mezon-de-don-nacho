// js/cuenta_local.js - Versión simplificada y funcional
(function () {
    'use strict';
    // VARIABLES GLOBALES
    const modalServicio = document.getElementById("modalServicio");
    const modalSubServicio = document.getElementById("subServicio");
    const modalP = document.getElementById("modalP");
    const modalLocalCuenta = document.getElementById("LocalCuenta");

    // FUNCIONES BÁSICAS
    function abrirModal(modal) {
        if (modal) {
            console.log("Abriendo modal:", modal.id);
            modal.style.display = "flex";
            document.body.style.overflow = 'hidden';
        }
    }

    function cerrarModal(modal) {
        if (modal) {
            console.log("Cerrando modal:", modal.id);
            modal.style.display = "none";
            document.body.style.overflow = 'auto';
        }
    }

    // 1. CONFIGURACIÓN MODAL SERVICIO (Formulario domicilio)
    const btnAbrirServicio = document.getElementById("abrirModalBtnServicio");
    const btnCerrarServicio = document.querySelector(".cerrarModalServicio");

    if (btnAbrirServicio) {
        btnAbrirServicio.addEventListener('click', function (e) {
            e.preventDefault();
            abrirModal(modalServicio);
        });
    }

    if (btnCerrarServicio) {
        btnCerrarServicio.addEventListener('click', function (e) {
            e.preventDefault();
            cerrarModal(modalServicio);
        });
    }


    // 3. CONFIGURACIÓN MODAL SUBSERVICIO (Confirmar dirección)
    const btnCerrarSubServicio = document.querySelector(".cerrarsubServicio");
    const btnAgregarDireccion = document.getElementById("btnAgregarNuevaDireccion");
    const formSubServicio = document.querySelector('#subServicio form');

    if (btnCerrarSubServicio) {
        btnCerrarSubServicio.addEventListener('click', function (e) {
            e.preventDefault();
            cerrarModal(modalSubServicio);
        });
    }

    if (btnAgregarDireccion) {
        btnAgregarDireccion.addEventListener('click', function (e) {
            e.preventDefault();
            cerrarModal(modalSubServicio);
            abrirModal(modalServicio);
        });
    }


    if (formSubServicio) {
        formSubServicio.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log("Confirmando dirección");

            // Cerrar modal actual y abrir siguiente
            cerrarModal(modalSubServicio);
            abrirModal(modalP);

            // Enviar datos al servidor
            const formData = new FormData(this);
            fetch('guardar_direccion.php', {
                method: 'POST',
                body: formData
            })
                .then(response => response.text())
                .then(data => {
                    console.log("Respuesta del servidor:", data);
                    if (data !== "OK") {
                        console.error("Error al guardar dirección");
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        });
    }

    // 4. CONFIGURACIÓN MODAL LOCAL
    const btnAbrirLocal = document.getElementById("BtnModalLocal");
    const btnCerrarLocalCuenta = document.querySelector(".cerrar-local");

    if (btnAbrirLocal) {
        btnAbrirLocal.addEventListener('click', function (e) {
            e.preventDefault();
            console.log("Abriendo modal LocalCuenta");
            abrirModal(modalLocalCuenta);
        });
    }

    if (btnCerrarLocalCuenta) {
        btnCerrarLocalCuenta.addEventListener('click', function (e) {
            e.preventDefault();
            cerrarModal(modalLocalCuenta);
        });
    }

    // ===============================================
    // 5. CONFIGURACIÓN INTERACCIÓN DETALLES
    // ===============================================
    // Para domicilio
    const flechaResumenDom = document.getElementById("resumen");
    const detalleProductosDom = document.getElementById("detalle");
    if (flechaResumenDom && detalleProductosDom) {
        flechaResumenDom.addEventListener('click', function () {
            this.classList.toggle('activo');
            detalleProductosDom.classList.toggle('activo');
        });
    }

    // Para local
    const flechaResumenLocal = document.getElementById("flecha-resumen");
    const detalleProductosLocal = document.getElementById("detalle-productos");
    if (flechaResumenLocal && detalleProductosLocal) {
        flechaResumenLocal.addEventListener('click', function () {
            this.classList.toggle('activo');
            detalleProductosLocal.classList.toggle('activo');
        });
    }

    // 6. CONFIGURACIÓN FORMULARIOS FINALES (CON AJAX)

    // Formulario pedido DOMICILIO
    const formPedidoDomicilio = document.querySelector('#modalP form[action="funciones/confirmar_pedido.php"]');
    if (formPedidoDomicilio) {
        formPedidoDomicilio.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log("Enviando pedido DOMICILIO");

            const btnPedir = document.getElementById('btn-pedir-domicilio');
            const textoOriginal = btnPedir.textContent;
            btnPedir.textContent = 'Procesando...';
            btnPedir.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: new FormData(this)
            })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al procesar el pedido');
                    btnPedir.textContent = textoOriginal;
                    btnPedir.disabled = false;
                });
        });
    }

    // Formulario pedido LOCAL
    const formPedidoLocal = document.querySelector('#LocalCuenta form[action="funciones/confirmar_pedidoLocal.php"]');
    if (formPedidoLocal) {
        formPedidoLocal.addEventListener('submit', function (e) {
            e.preventDefault();
            console.log("Enviando pedido LOCAL");

            const btnPedir = document.getElementById('btn-pedir-local');
            const textoOriginal = btnPedir.textContent;
            btnPedir.textContent = 'Procesando...';
            btnPedir.disabled = true;

            fetch(this.action, {
                method: 'POST',
                body: new FormData(this)
            })
                .then(response => {
                    if (response.redirected) {
                        window.location.href = response.url;
                    } else {
                        location.reload();
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('Error al procesar el pedido');
                    btnPedir.textContent = textoOriginal;
                    btnPedir.disabled = false;
                });
        });
    }

    // 7. CONFIGURACIÓN CAMPOS OCULTOS
    function configurarCamposOcultos() {
        // Para domicilio
        const selectPagoDomicilio = document.querySelector('#modalP .metodo-pago');
        const textareaComentarioDomicilio = document.querySelector('#modalP textarea[name="comentario"]');
        const inputMetodoPagoDom = document.getElementById('inputMetodoPagoDomicilio');
        const inputComentarioDom = document.getElementById('inputComentarioDomicilio');

        if (selectPagoDomicilio && inputMetodoPagoDom) {
            inputMetodoPagoDom.value = selectPagoDomicilio.value;
            selectPagoDomicilio.addEventListener('change', function () {
                inputMetodoPagoDom.value = this.value;
            });
        }

        if (textareaComentarioDomicilio && inputComentarioDom) {
            textareaComentarioDomicilio.addEventListener('input', function () {
                inputComentarioDom.value = this.value;
            });
        }

        // Para local
        const selectPagoLocal = document.querySelector('#LocalCuenta .metodo-pago');
        const textareaComentarioLocal = document.querySelector('#LocalCuenta textarea[name="comentario_local"]');
        const inputMetodoPagoLocal = document.getElementById('inputMetodoPagoLocal');
        const inputComentarioLocal = document.getElementById('inputComentarioLocal');

        if (selectPagoLocal && inputMetodoPagoLocal) {
            inputMetodoPagoLocal.value = selectPagoLocal.value;
            selectPagoLocal.addEventListener('change', function () {
                inputMetodoPagoLocal.value = this.value;
            });
        }

        if (textareaComentarioLocal && inputComentarioLocal) {
            textareaComentarioLocal.addEventListener('input', function () {
                inputComentarioLocal.value = this.value;
            });
        }
    }

    // 8. CERRAR MODALES AL HACER CLIC FUERA
    function configurarClicFuera() {
        const modales = [modalServicio, modalSubServicio, modalP, modalLocalCuenta];

        modales.forEach(modal => {
            if (modal) {
                window.addEventListener('click', function (event) {
                    if (event.target === modal) {
                        cerrarModal(modal);
                    }
                });
            }
        });
    }

    document.addEventListener('DOMContentLoaded', function () {
        console.log('DOM cargado - inicializando...');
        configurarCamposOcultos();
        configurarClicFuera();
        console.log('=== JS INICIALIZADO ===');
    });

})();