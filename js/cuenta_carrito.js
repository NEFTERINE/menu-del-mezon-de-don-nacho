
// Obtén los elementos que usaremos
const modal = document.getElementById("modalP");
const btnAbrir = document.getElementById("BtnCuenta");
const btnCerrar = document.querySelector("cerrar-cuenta");
const Resumen = document.getElementById("resumen");
const detalle = document.getElementById("detalle");
const btnPedirDomicilio = document.getElementById("btn-pedir-domicilio");


// 1. Abrir modal
if (btnAbrir && modal) {
    btnAbrir.addEventListener('click', function(e) {
        e.preventDefault(); 
        modal.style.display = "flex"; 
    });
}

// 2. Toggle del detalle de productos
if (Resumen && detalle) {
    Resumen.addEventListener('click', function() {
        this.classList.toggle('activo');
        detalle.classList.toggle('activo');
    });
}

// 3. Procesar pedido - CON EVENT LISTENER
if (btnPedirDomicilio) {
    btnPedirDomicilio.addEventListener('click', function() {
        procesarPedido();
    });
}

function procesarPedido() {
    // Ocultar botón y mostrar spinner
    document.getElementById('cont').style.display = 'none';
    document.getElementById('proces').style.display = 'block';

    setTimeout(() => {
        document.getElementById('proces').style.display = 'none';
        document.getElementById('confir').style.display = 'block';

        setTimeout(() => {
            window.location.href = "index.php";
        }, 1500);
    }, 2000);
}

// 4. Cerrar modal
if (btnCerrar && modal) {
    btnCerrar.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Cerrando modal local");
        modal.style.display = "none";
    });
}

// 5. Cerrar modal al hacer clic fuera
if (modal) {
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            console.log("Clic fuera del modal local - cerrando");
            modal.style.display = "none";
        }
    });
}