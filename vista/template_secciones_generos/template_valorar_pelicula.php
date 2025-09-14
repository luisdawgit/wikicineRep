<!-- template_valorar_pelicula.php -->
<!-- Cada estrella -->
<div class="stars" id="ratingStars">
    <span class="star" data-value="1">&#9733;</span>
    <span class="star" data-value="2">&#9733;</span>
    <span class="star" data-value="3">&#9733;</span>
    <span class="star" data-value="4">&#9733;</span>
    <span class="star" data-value="5">&#9733;</span>
    <span class="star" data-value="6">&#9733;</span>
    <span class="star" data-value="7">&#9733;</span>
    <span class="star" data-value="8">&#9733;</span>
    <span class="star" data-value="9">&#9733;</span>
    <span class="star" data-value="10">&#9733;</span>
</div>

<button id="botonValoracion" class="button_slide slide_right" type="submit" name="botonValoracion">
    Votar
</button>

<script>
const stars = document.querySelectorAll('.star');
const puntuacion_usuario = document.getElementById('puntuacion_usuario');
const botonValoracion = document.getElementById('botonValoracion');
let selectedValue = null;
let puntuacion_media = document.getElementById('puntuacion_media');


stars.forEach(star => {
    star.addEventListener('click', () => {
        selectedValue = star.getAttribute('data-value');

        // Actualizar el texto de la puntuación
        puntuacion_usuario.textContent = `: ${selectedValue}`;

        // Actualizar el estilo visual
        stars.forEach(s => s.classList.remove('selected'));
        for (let i = 0; i < selectedValue; i++) {
            stars[i].classList.add('selected');
        }

        //Evitar que se mande una votacion vacia
        botonValoracion.disabled = false;
    })
});


botonValoracion.addEventListener('click', () => {

    if (!selectedValue) {
        Swal.fire('Por favor, selecciona una puntuación antes de guardar.');
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
                puntuacion_media.textContent = data.puntuacion_media; // Actualizar la puntuación media

                Swal.fire({
                    // toast: true,
                    timer: 3000,
                    text: 'Tu puntuación fue enviada correctamente.',
                    icon: 'success',
                    iconColor: 'white',
                    color: '#1a1a1a', //negro 2 medio 
                    width: '18em',
                    Heighth: '18em',
                    padding: '10px',
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
</script>