const loginForm = document.getElementById("loginForm");
const botonEnviar = document.getElementById("botonEnviar");

loginForm.addEventListener("submit", async (e) => {
      e.preventDefault();
      const nombreUsuario = document.getElementById("username");
      const contraseñaUsuario = document.getElementById("password");
    
      const conclusion = validacionCamposVacios(nombreUsuario, contraseñaUsuario);
    
      if(conclusion != null) {
        alertaLogin(conclusion);
        return;
      }
    //--- bloque try catch ---
      // Si pasa validación, envía los datos al backend
    try{
        const respuesta = await fetch("../controlador/validar_loginUsuario.php",{
            method:"POST",
            headers:{
            "Content-Type": "application/json",
            },
            body: JSON.stringify({
                nombre:nombreUsuario.value,
                contraseña:contraseñaUsuario.value,
            }),
        });
        
    //------------ Visualizar errores nuevo experimento 
    const texto = await respuesta.text(); // Leer el texto crudo de la respuesta
    console.log("Respuesta del servidor:", texto);
    
    let data;
    try {
        // Intentamos convertir ese texto a JSON
        data = JSON.parse(texto);
    } catch (e) {
        // Si falla (por ejemplo si viene HTML con un error), caemos aquí
        console.error("Respuesta no es JSON válido:", e);
        alertaLogin("Error inesperado del servidor.");
        return;
    }
    //------------ Visualizar errores nuevo experimento end
    
        if (data.exito) {
            exitoLogin(data.mensaje);
        }else{
            alertaLogin(data.mensaje);
        }
            
    }catch(error){
        // Mostrar el error con alert()
        console.log("Hubo un error al contactar con el servidor: " + error); 
        //CONSERVAR 
        alertaLogin("Hubo un error al contactar con el servidor.");
    }
    //--- bloque try catch end ---
});


function exitoLogin(textoMostrar) {
    Swal.fire({
        title: "¡Login exitoso!",
        text: "Bienvenido",
        icon: "success",
        timer: 1000,
        iconColor: "white",
        background: '#00a354', //verde
        showConfirmButton: true,
        color: "white",
                customClass: {
            confirmButton: 'btn-confirm'
        },
        
      }).then(() => {
        // header('Location: ../vista/principal_page.php');
        window.location.href = "../vista/principal_page.php";
    });
}

function alertaLogin(textoMostrar) {
  Swal.fire({
    text: textoMostrar,
    icon: "warning",
    iconColor: "white",
    background: "#0069D9",//azul bueno
    showConfirmButton: true,
    color: "white",
        customClass: {
            confirmButton: 'btn-confirm'
        }
  });
}


function validacionCamposVacios(nombreUsuarioX, contraseñaUsuarioX) {
  if (nombreUsuarioX.value == "" && contraseñaUsuarioX.value == "") {
    return "Todos los campos son obligatorios.";
  }
  if (nombreUsuarioX.value == "") {
    return "Introduce el usuario.";
  }
  if (contraseñaUsuarioX.value == "") {
    return "Introduce la contraseña.";
  }
 
  if (contraseñaUsuarioX !== "" && nombreUsuarioX !== "") {
    return null;
  }
}