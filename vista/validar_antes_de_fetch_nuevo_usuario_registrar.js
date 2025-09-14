
      document.addEventListener("DOMContentLoaded", function () {    
        registerForm.addEventListener("submit", async function (e) {

        e.preventDefault(); // Evita el envío inmediato del formulario

        const usernameNew = document.getElementById("usernameNew").value.trim();
        const emailNew = document.getElementById("emailNew").value.trim();
        const passwordNew = document.getElementById("passwordNew").value.trim();

        const mensajeError = validarCampos(usernameNew, emailNew, passwordNew);

        try {
          //Llegan los datos
          const respuesta = await fetch(
            "../controlador/validar_nuevo_usuario_registrar.php",
            {
              method: "POST",
              headers: {
                "Content-Type": "application/json",
              },
              body: JSON.stringify({
                email: emailNew,
              }), // Enviar el email al servidor
            }
          );

          //Analisis de los datos recibidos
          if (!respuesta.ok) {
            throw new Error("Error en la solicitud al servidor.");
          }

          const data = await respuesta.json();

          if (mensajeError) {
            mensajeErrorMostrar(mensajeError);
            return;
          }
/* para comprobar que no se repite un correo */
              if (data.repetido) {
                mensajeErrorEmail = "Ese email ya esta registrado";
                emailNew.value = ""; // Limpiar el campo
                mensajeErrorMostrar(mensajeErrorEmail);
              } else {
                // Si todo es correcto se envia.
                e.target.submit();
              }
/* para comprobar que no se repite un correo end*/

        } catch (error) {
          Swal.fire({
            title: "Ocurrió un problema:",
            text: error.message,
            color: "white",
            icon: "warning",
            iconColor: "red",
            background: "#0069D9",//azul bueno
            confirmButtonText: "Ok",
            customClass: {
                confirmButton: 'btn-confirm'
            }
          });
        }

      });

    });




function validarCampos(usernameNew, emailNew, passwordNew){
    if(usernameNew == "" && emailNew == "" && passwordNew == ""){
        mensajeError = "Ninguno de los campos puede estar vacio";
        return mensajeError;
    }
    if(usernameNew == ""){
        mensajeError = "El campo nombre de usuario no puede estar vacio";
        return mensajeError;
    }
    if(emailNew == ""){
        mensajeError = "El campo e-mail no puede estar vacio";
        return mensajeError;
    }
    if(passwordNew == ""){
        mensajeError = "La campo contraseña no puede estar vacio";
        return mensajeError;
    }
    
    return null;
}    

function mensajeErrorMostrar(error) {
  Swal.fire({
    // timer: "300",
    text: error,
    icon: "warning",
    color: "white",
    iconColor: "white",
    background: "#0069D9",//azul bueno
    confirmButtonText: "Ok",
    customClass: {
        confirmButton: 'btn-confirm'
    }
  });
}

