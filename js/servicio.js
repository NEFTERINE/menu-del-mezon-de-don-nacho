// document.addEventListener('DOMContentLoaded', function() {
//   const botones = document.querySelectorAll('.btn-servicio');
//   const modal = document.getElementById('modal-servicio');
//   const form = document.getElementById('form-servicio');
//   const titulo = document.getElementById('titulo-form');
//   const cerrar = document.getElementById('cerrar-modal');

  
//   // Cierra el modal
//   cerrar.addEventListener('click', () => modal.style.display = 'none');

//   // Manejo de selección de servicio
//   botones.forEach(boton => {
//     boton.addEventListener('click', function() {
//       const tipo = this.dataset.tipo;
//       modal.style.display = 'flex';

//       // Limpia el formulario anterior
//       form.innerHTML = '';

//       if (tipo === 'domicilio') {
//         titulo.textContent = 'Datos de entrega a domicilio';
//         form.innerHTML = `
//           <input type="hidden" name="servicio" value="domicilio">
//           <label>Nombre:</label>
//           <input type="text" name="nombre" required>
//           <label>Teléfono:</label>
//           <input type="tel" name="telefono" required>
//           <label>Dirección:</label>
//           <input type="text" name="direccion" required>
//           <label>Referencias:</label>
//           <textarea name="referencias"></textarea>
//           <button type="submit" class="button">Continuar</button>
//         `;
//       } else {
//         titulo.textContent = 'Datos del cliente (en local)';
//         form.innerHTML = `
//           <input type="hidden" name="servicio" value="local">
//           <label>Nombre:</label>
//           <input type="text" name="nombre" required>
//           <label>Teléfono:</label>
//           <input type="tel" name="telefono" required>
//           <button type="submit" class="button">Continuar</button>
//         `;
//       }
//     });
//   });

//   // Enviar formulario
//   form.addEventListener('submit', async function(e) {
//     e.preventDefault();

//     const datos = new FormData(form);

//     const response = await fetch('funciones/guardar_datos_temporales.php', {
//       method: 'POST',
//       body: datos
//     });

//     const data = await response.json();
//     if (data.success) {
//       // Redirige al resumen del pedido
//       window.location.href = 'resumen_pedido.php';
//     } else {
//       alert('Error: ' + data.error);
//     }
//   });
// });
