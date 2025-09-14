<!-- controller_Valorar_pelicula.php -->
<script>
    puntuacion_usuario = document.getElementById("puntuacion_usuario");
    openRatingModal = document.getElementById("openRatingModal");
    openRatingModal.addEventListener("click", () => {

    let selectedValue = null; // Inicializamos la variable para la puntuación seleccionada

    Swal.fire({
        html: `
            <p id = "instruccion_puntuar">Puntua de 0 a 10</p>
            <p id = "puntuacion_usuario">?</p>
            <div class="stars" id="ratingStars">
                <button class="star" data-value="1">&#9733;</button>
                <button class="star" data-value="2">&#9733;</button>
                <button class="star" data-value="3">&#9733;</button>
                <button class="star" data-value="4">&#9733;</button>
                <button class="star" data-value="5">&#9733;</button>
                <button class="star" data-value="6">&#9733;</button>
                <button class="star" data-value="7">&#9733;</button>
                <button class="star" data-value="8">&#9733;</button>
                <button class="star" data-value="9">&#9733;</button>
                <button class="star" data-value="10">&#9733;</button>
            </div>
            <button id="botonValoracion" class="pulse-button" type="button">
                Enviar
            </button>
        `,
        showConfirmButton: false,
        confirmButtonText: "Ok",
        background: '#1a1a1a', // negro 2 medio
        color: 'white',
        border: '2px solid white',
        // Capturar los elementos html dinámicos pasados como string a la propiedad html
        didOpen: () => {
            // Obtener el contenedor del modal
            const modalContainer = Swal.getHtmlContainer();
            const puntuacion_usuarioContainer = modalContainer.querySelector(
                '#puntuacion_usuario');

            if (!modalContainer) {
                console.error('No se pudo encontrar el contenedor de SweetAlert2.');
                return;
            }

            // Intentar capturar el elemento ratingStars
            const starsContainer = modalContainer.querySelector('#ratingStars');
            console.log('Stars Container:', starsContainer); // Depuración

            // Si no se encuentra, mostrar error
            if (!starsContainer) {
                console.error('No se encontró el elemento #ratingStars dentro del modal.');
                return;
            }

            // Capturar todas las estrellas
            const starElements = starsContainer.querySelectorAll('.star');
            if (starElements.length === 0) {
                console.error('No se encontraron elementos .star dentro de #ratingStars.');
                return;
            }

            // Capturar los elementos dinámicos desde el contenedor
            const botonValoracion = modalContainer.querySelector('#botonValoracion');

            starElements.forEach(star => {
                star.addEventListener('click', () => {
                    selectedValue = star.getAttribute('data-value');

                    // Actualizar estilos
                    starElements.forEach(s => s.classList.remove('selected'));
                    for (let i = 0; i < selectedValue; i++) {
                        starElements[i].classList.add('selected');
                    }

                    // Habilitar el boton si hay una selección
                    botonValoracion.disabled = false;
                    botonValoracion.classList.add('pulse-button-activo');

                    // Mostrar en la ventana modal la puntuacion seleccionada
                    puntuacion_usuarioContainer.textContent = selectedValue;

                });
            });


            botonValoracion.addEventListener('click', () => {

                if (!selectedValue) {
                    Swal.fire({
                        timer: 3000,
                        text: 'Por favor, selecciona una puntuación antes de guardar.',
                        icon: 'warning',
                        iconColor: 'white',
                        color: 'white',
                        width: '18em',
                        Height: '18em',
                        padding: '10px',
                        background: '#0069d9', //azul
                        confirmButtonText: 'Ok',
                        customClass: {
                            confirmButton: 'custom-confirm-button-bien', // Clase personalizada
                        }
                    })
                    return;
                }

                fetch('guardar_rating.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({
                            rating: selectedValue
                        }),
                    })
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Error en la solicitud.');
                        }
                        return response.json();
                    })
                    .then(data => {
                        if (data.success) {
                            puntuacion_media.textContent = data
                                .puntuacion_media; // Actualizar la puntuación media

                            Swal.fire({
                                timer: 3000,
                                text: 'Tu puntuación fue enviada correctamente.',
                                icon: 'success',
                                iconColor: 'white',
                                color: 'white',
                                width: '23em',
                                Height: '23em',
                                background: '#00a354', //verde
                                confirmButtonText: 'Ok',
                                customClass: {
                                    confirmButton: 'custom-confirm-button-bien', // Clase personalizada
                                }
                            })
                        } else {
                            Swal.fire({
                                title: 'Ocurrió un error al guardar tu puntuacion: ',
                                toast: true,
                                text: data.error,
                                icon: 'error',
                                iconColor: 'red',
                                color: 'white',
                                confirmButtonText: 'Ok',
                                customClass: {
                                    confirmButton: 'custom-confirm-button-error' // Clase personalizada
                                },
                            })
                        }
                    })
                    .catch(error => {
                        Swal.fire({
                            title: 'Ocurrió un problema: ',
                            toast: true,
                            text: error.message,
                            background: 'red',
                            icon: 'error',
                            iconColor: 'white',
                            color: 'white',
                            confirmButtonText: 'Ok',
                            customClass: {
                                confirmButton: 'custom-confirm-button-error', // Clase personalizada
                            },
                        });
                    });
            });

        },
    });
});
</script>