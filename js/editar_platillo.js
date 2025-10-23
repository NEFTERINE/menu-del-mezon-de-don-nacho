document.addEventListener('DOMContentLoaded', function() {
// En cuenta_local.js - usa nombres únicos
const modal = document.getElementById("editar-platillo");
const btnAbrir = document.getElementById("editar");
const btnCerrar = document.querySelector(".cerrar-plato");

// Luego usa estos nombres únicos en todo tu código...
if (btnAbrir && modal) {
    btnAbrir.addEventListener('click', function(e) {
        e.preventDefault(); 
        modal.style.display = "flex"; 
    });
}
// 2. Cerrar el modal al hacer clic en la 'x'
if (btnCerrar && modal) {
    btnCerrar.addEventListener('click', function(e) {
        e.preventDefault();
        console.log("Cerrando modal");
        modal.style.display = "none";
    });
}
// 3. Cerrar el modal si el usuario hace clic fuera del contenido
if (modal) {
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            console.log("Clic fuera del modal - cerrando");
            modal.style.display = "none";
        }
    });
}

});

const input = document.querySelector("input");
const preview = document.querySelector(".preview");

input.style.opacity = 0;
input.addEventListener("change", updateImageDisplay);

function updateImageDisplay() {
  while (preview.firstChild) {
    preview.removeChild(preview.firstChild);
  }

  const curFiles = input.files;
  if (curFiles.length === 0) {
    const para = document.createElement("p");
    para.textContent = "No hay archivos seleccionados actualmente para subir";
    preview.appendChild(para);
  } else {
    const list = document.createElement("ol");
    preview.appendChild(list);

    for (const file of curFiles) {
      const listItem = document.createElement("li");
      const para = document.createElement("p");
      if (validFileType(file)) {
        para.textContent = `Nombre del archivo ${file.name}, tamaño del archivo ${returnFileSize(
          file.size,
        )}.`;
        const image = document.createElement("img");
        image.src = URL.createObjectURL(file);
        image.alt = image.title = file.name;

        listItem.appendChild(image);
        listItem.appendChild(para);
      } else {
        para.textContent = `Nombre del archivo ${file.name}: Tipo de archivo no válido. Actualiza tu selección.`;
        listItem.appendChild(para);
      }

      list.appendChild(listItem);
    }
  }
}

// https://developer.mozilla.org/es/docs/Web/Media/Formats/Image_types
const fileTypes = [
  "image/apng",
  "image/bmp",
  "image/gif",
  "image/jpeg",
  "image/pjpeg",
  "image/png",
  "image/svg+xml",
  "image/tiff",
  "image/webp",
  "image/x-icon",
];

function validFileType(file) {
  return fileTypes.includes(file.type);
}

function returnFileSize(number) {
  if (number < 1e3) {
    return `${number} bytes`;
  } else if (number >= 1e3 && number < 1e6) {
    return `${(number / 1e3).toFixed(1)} KB`;
  } else {
    return `${(number / 1e6).toFixed(1)} MB`;
  }
}