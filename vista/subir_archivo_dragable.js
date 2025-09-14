//subir_archivo_dragable.js

const dropZone = document.getElementById("dropZone");
const poster = document.getElementById("poster");
const fileList = document.getElementById("fileList");
let dropZoneP = dropZone.querySelectorAll("p");

// Resalta la zona al arrastrar un archivo
dropZone.addEventListener("dragover", (event) => {
  event.preventDefault();
  dropZone.classList.add("dragover");
});

// Elimina el resaltado cuando se sale
dropZone.addEventListener("dragleave", () => {
  dropZone.classList.remove("dragover");
});

// Abre el selector de archivos al hacer clic en la zona
dropZone.addEventListener("click", () => {
  poster.click();
});

// Maneja el evento de soltar archivos
dropZone.addEventListener("drop", (event) => {
  event.preventDefault();
  dropZone.classList.remove("dragover");

  dropZone.classList.add("drop-zone-cargado");

  // Obtiene los archivos y procesa
  const files = event.dataTransfer.files;
  handleFiles(files);

  //Asignar archivo al input de poster
  poster.files = files;
});

// Maneja la selección de archivos a traves del input
poster.addEventListener("change", (event) => {
  const files = event.target.files;
  handleFiles(files);
});

// Procesa y muestra los archivos
function handleFiles(files) {
  for (const file of files) {
    //--- Añadir imagen
    for (const file of files) {
      if (!file.type.startsWith("image/")) {
        alert("Solo se permiten imágenes.");
        return;
      }

    //--- Añadir imagen end

      dropZone.classList.add("drop-zone-cargado");
      dropZone.classList.add("agregado");
      dropZoneP[1].classList.add("nombreArchivo"); // por que no funciona "agregado p:last-child"

      dropZoneP[1].textContent = `${file.name} (${Math.round(
        file.size / 1024
      )} KB)`;
    }
  }
}

//--- poster ---

//--- poster end ---
