//validar_antes_de_fetch.js

const quitarActorBoton = document.getElementById("quitarActorBoton");
const quitarGuionistaBoton = document.getElementById("quitarGuionistaBoton");

let numeroActor = 1;
let contador = {
  actores: 1,
  guionistas: 1,
};

// Botones de agregar y quitar elementos DOM ---

nuevoActorBoton.addEventListener("click", (e) => {
  agregarElemento("actoresDiv", "actores");
});

nuevoGuionistaBoton.addEventListener("click", (e) => {
  agregarElemento("guionistasDiv", "guionistas");
});

quitarActorBoton.addEventListener("click", (e) => {
  eliminarElemento("actoresDiv", "actores");
});

quitarGuionistaBoton.addEventListener("click", (e) => {
  eliminarElemento("guionistasDiv", "guionistas");
});

// Botones de agregar y quitar elementos DOM end ---

document
  .getElementById("formulario")
  .addEventListener("submit", async function (e) {
    e.preventDefault(); // Evita el envío inmediato del formulario

    //....................................................................

    //validar_antes_de_fetch.js
    document
      .getElementById("formulario")
      .addEventListener("submit", async function (e) {
        e.preventDefault(); // Evita el envío inmediato del formulario

        // Capturar elementos del DOM ---
        /* Implementar control para que no quede ningun campo vacio */

        //Tienes que capturar el titulo aqui por el async.
        const tituloInput = document.getElementById("titulo");
        const errorMostrar = document.getElementById("error-mostrar");

        const directorInput = document.getElementById("directorNombre");
        const trailerInput = document.getElementById("trailer");

        //Alterado
        const generoInputs = document.querySelectorAll('input[name="generos[]"]:checked'); 
        
        const nombreArchivoInput = document.getElementById("nombreArchivo");
        const posterInput = document.getElementById("poster");

        const sinopsisInput = document.getElementById("sinopsis");

        const actoresInput = document.querySelectorAll(
          'input[name="actoresNombres[]"]'
        );
        const guionistasInput = document.querySelectorAll(
          'input[name="guionistasNombres[]"]'
        );
        // Capturar elementos del DOM end ---

        /* Hay que quitar espaciados tambien para comprobar el titulo.*/
        const titulo = tituloInput.value.trim();
        tituloInput.value = tituloInput.value.trim();

        const director = directorInput.value.trim();
        directorInput.value = directorInput.value.trim();

        const trailer = trailerInput.value.trim();
        trailerInput.value = trailerInput.value.trim();

        //Alterado
        const generosSeleccionados = Array.from(generoInputs).map(input => input.value);
        
        const sinopsis = sinopsisInput.value.trim();
        const nombreArchivo = nombreArchivoInput.textContent.trim();
        const posterFormato = posterInput.accept;

        actoresInput.forEach((actor) => {
          actor.value = actor.value.trim();
        });

        guionistasInput.forEach((guionista) => {
          guionista.value = guionista.value.trim();
        });
        
//  Validaciones validar campos y validar trailer ahora aqui  ahora aqui ---

          const error = validarCampos(
            titulo,
            director,
            trailer,
            //genero,
            generosSeleccionados,
            actoresInput,
            guionistasInput,
            nombreArchivo,
            sinopsis
          );
          if (error) {
            mensajeErrorMostrar(error);
            return;// No quitar nunca-----<<<<<<<<<<<<<<<<<<<<<<
          }
          /*
          */
        
        //campos repetidos actores y guionistas
          //--- Validar actores no repetidos ----------------------------------------
            const errorRepetidoActor = validarCamposNoRepetidos(actoresInput);
            if (errorRepetidoActor) {
                
            mensajeErrorMostrar(errorRepetidoActor + " los actores.");
                return;
            }
            
            const errorRepetidoGuionista = validarCamposNoRepetidos(guionistasInput);
            if (errorRepetidoGuionista) {
            mensajeErrorMostrar(errorRepetidoGuionista + " los guionistas.");
                return;
            }
            
          //--- Validar actores no repetidos end ----------------------------------------


          // errorTrailerUrl ---...........................................
          const errorTrailerUrl = validarTrailerEsUrl(trailer);
          if (errorTrailerUrl) {
            mensajeErrorMostrar(errorTrailerUrl);
            return;
          }
          // errorTrailerUrl end ---...........................................

// Validaciones validar campos y validar trailer ahora aqui end ---

        try {
          //Llegan los datos
          const respuesta = await fetch(
            "../controlador/validar_datosNuevaPelicula.php",
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                titulo, trailer
              }), // Enviar el título y trailer al servidor
            }
          );

          //Analisis de los datos recibidos
          if (!respuesta.ok) {
            throw new Error("Error en la solicitud al servidor.");
          }

          const data = await respuesta.json();


          let mensajeError = "";
            //BORRAR DESPUES
            if (!data) {
              throw new Error("Respuesta del servidor no válida XXX");
            }
            
          if (data.trailer_repetido){
            // Mostrar mensaje de error si el trailer está repetido
            mensajeError = "Ese trailer ya esta registrado";
            trailerInput.value = ""; // Limpiar el campo
            mensajeErrorMostrar(mensajeError);
            return;
          }
          
          if (data.repetido) {
            // Mostrar mensaje de error si el título está repetido
            mensajeError = "Ese titulo ya esta registrado";
            tituloInput.value = ""; // Limpiar el campo
            mensajeErrorMostrar(mensajeError);
            return;
          }
          else {
            //Si todo es correcto se envia.
            e.target.submit();
          }
        } catch (error) {
          Swal.fire({
            title: "Ocurrió un problema:",
            text: error.message,
            icon: "error",
            iconColor: "red",
            background: "white",
            confirmButtonText: "Ok",
            customClass: {
                confirmButton: 'btn-confirm'
            }
            
          });
        }
      });
  });

//--- poster ---

poster.addEventListener("change", validarFormatoPosterBuena);
dropZone.addEventListener("drop", validarFormatoPosterBuena);

function validarFormatoPosterBuena(e) {
  //..................................................
  // Detectar si los archivos provienen del input o del drag & drop.

  if (e.target && e.target.files) {
    filesInput = e.target; // Archivos desde el input.
    files = e.target.files;
  } else if (e.dataTransfer && e.dataTransfer.files) {
    filesInput = e.dataTransfer; // Archivos desde el input.
    files = e.dataTransfer.files; // Archivos desde el drag & drop.
  } else {
    console.log(e.target.files);

    console.error("No se pudieron detectar los archivos.");
    return false;
  }
  //...

  const file = files[0]; // Obtener el archivo seleccionado

  console.log(files);
  const allowedTypes = ["image/png", "image/jpeg"]; // Tipos permitidos
  let previewImage = document.getElementById("previewImage"); // Elemento para mostrar la imagen
  let nombreArchivo = document.getElementById("nombreArchivo"); // Nombre del archivo de imagen

  if (!file) {
    console.warn("No se seleccionó ningún archivo.");
    return;
  }

  // Validar tipo de archivo
  if (!allowedTypes.includes(file.type)) {
    //--- Limpiar el input y la vista previa ---
    document.getElementById("poster").value = null;
    file.value = "";
    previewImage.src = "";
    nombreArchivo.textContent = "";
    previewImage.style.display = "none"; // Ocultar la vista previa si estaba visible
    dropZone.classList.remove("drop-zone-cargado");
    dropZone.classList.remove("agregado");

    //--- Limpiar el input y la vista previa end ---

    Swal.fire({
      text: "El tipo de archivo no es válido. Solo se permiten imágenes PNG o JPEG.",
      color: "white",
      icon: "warning",
      iconColor: "white",
      background: '#0069d9', //azul
      confirmButtonText: "Ok",
        customClass: {
            confirmButton: 'btn-confirm'
        }
    });
    return;
  }

  //Mostrar vista previa de la imagen
  const reader = new FileReader();
  reader.onload = function (e) {
    previewImage.src = e.target.result; // Asignar la URL de la imagen al elemento <img>
    previewImage.style.display = "block"; // Mostrar la imagen si estaba oculta
  };
  reader.readAsDataURL(file); // Leer el archivo seleccionado

  //..................................................
}

//..................................................

//--- poster end ---
// Mostrar un mensaje usando SweetAlert2
function mensajeErrorMostrar(mensajeErrorTexto) {
  Swal.fire({
    // timer: "300",
    text: mensajeErrorTexto,
    icon: "warning",
    color: "white",
    iconColor: "white",
    background: "#0069d9",
    confirmButtonText: "Ok",
    customClass: {
        confirmButton: 'btn-confirm'
    }
  });
}

// Botones de agregar y quitar elementos ---

function agregarElemento(contenedorId, tipo) {
  contador[tipo]++; // Incrementar el contador del tipo

  // Obtener el contenedor
  const contenedorDiv = document.getElementById(contenedorId);

  // Crear el nuevo label e input
  const nuevoLabel = document.createElement("label");
  
  let tipo2 = "";  
  nuevoLabel.classList.add('labelActoresDirectores');
  if(tipo == "actores"){
      tipo2 = "actor";
  }else{
      tipo2 = "guionista";
  }
  
  nuevoLabel.textContent = `${tipo2.charAt(0).toUpperCase() + tipo2.slice(1)} ${
    contador[tipo]
  }`;

  const nuevoInput = document.createElement("input");
  nuevoInput.setAttribute("type", "text");
  nuevoInput.setAttribute("name", `${tipo}Nombres[]`);

  // Insertar los nuevos elementos en el contenedor
  contenedorDiv.append(nuevoLabel, nuevoInput);
}

function eliminarElemento(contenedorId, tipo) {
  const contenedorDiv = document.getElementById(contenedorId); // Obtener el div correcto
  const inputs = contenedorDiv.querySelectorAll("input"); // Obtener todos los inputs dentro del div
  const labels = contenedorDiv.querySelectorAll("label"); // Obtener todos los labels dentro del div

  if (inputs.length > 1) {
    contenedorDiv.removeChild(inputs[inputs.length - 1]); // Elimina el último input
    contenedorDiv.removeChild(labels[labels.length - 1]); // Elimina el último label
    contador[tipo]--; // Decrementar el contador del tipo
  }
}

// Botones de agregar y quitar elementos end ---

function validarCampos(
  titulo,
  director,
  trailer,
  //genero,
  generosSeleccionados,
  actoresInput,
  guionistasInput,
  nombreArchivo,
  sinopsis
) {
  //--- Validar campo  ----------------------------------------------------------------------------

  // Validar si el título está vacío
  if (titulo === "") {
    mensajeError = "El título no puede estar vacío.";
    return mensajeError;
  }

  // Validar si genero está vacío
   if (generosSeleccionados.length === 0) {
      mensajeError = "Debe seleccionar al menos un género.";
      return mensajeError;
   }

  // Validar si director está vacío
  if (director === "") {
    mensajeError = "El director no puede estar vacío.";
    return mensajeError;
  }

  // Validar si trailer está vacío
  if (trailer === "") {
    mensajeError = "El trailer no puede estar vacío.";
    return mensajeError;
  }

  // Validar si actor está vacío
  for (let actor of actoresInput) {
    actor.value = actor.value.trim();
    if (actor.value.trim() === "") {
      mensajeError = "Todos los campos de actores deben estar completos.";
      return mensajeError;
    }
  }

  // Validar si guionistas está vacío
  for (let guionista of guionistasInput) {
    guionista.value = guionista.value.trim();
    if (guionista.value.trim() === "") {
      mensajeError = "Todos los campos de guionistas deben estar completos.";
      return mensajeError; // Salir de la validación
    }
  }

  // Validar si el poster
  if (nombreArchivo === "") {
    mensajeError = "Sube una imagen. El poster no puede estar vacío.";
    return mensajeError;
  }

  // Validar si la sinopsis
  if (sinopsis === "") {
    mensajeError = "Escribe la sinopsis de la pelicula. Bastara con una breve nocion de su argumento.";
    return mensajeError;
  }

  // Si pasa todas las validaciones, retorna null (sin error)
  return null;

  //--- Validar campo end ----------------------------------------------------------------------------
}


function validarCamposNoRepetidos(arrInput) {
// Crear un conjunto para almacenar actores únicos
let ingresosUnicos = new Set();

for (let input of arrInput) {
  let textoInput = input.value.trim(); // Eliminar espacios en blanco

  if (ingresosUnicos.has(textoInput)) {
    mensajeError = "no pueden estar repetidos "; // Si ya existe, error
    return mensajeError;
  }
  ingresosUnicos.add(textoInput); // Agregar al conjunto
}
return null;
}



//Validar que la url es un trailer de youtube
function validarTrailerEsUrl(urlTrailer){

    let urlClickDerecho = "https://youtu.be/";
    let urlBarraNavegacion = "https://www.youtube.com/watch?v=";
    let urlBarraNavegacionCorta = "youtube.com/watch?v=";
// && !urlTrailer.includes(urlBarraNavegacionCorta)


    // Limpiar espacios en blanco
    urlTrailer = urlTrailer.trim();

    console.log("URL recibida:", urlTrailer); // Verificar qué URL llega

    if(!urlTrailer.startsWith(urlBarraNavegacion) && !urlTrailer.startsWith(urlClickDerecho)){
        mensajeError = "Este campo solo acepta una url de youtube X1";
        console.log("Error detectado:", mensajeError); // Para Depurar
        return mensajeError;
    }

    return null;
}

