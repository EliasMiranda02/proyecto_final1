
// CARRUSEL

const nextButton = document.querySelector('.next');
const prevButton = document.querySelector('.prev');
const imagesContainer = document.querySelector('.Imagen');
const totalImages = document.querySelectorAll('.img').length;
let currentIndex = 0;

nextButton.addEventListener('click', () => {
    if (currentIndex < totalImages - 3) { // Asegúrate de que no se pase del total
        currentIndex++;
        updateCarousel();
    }
});

prevButton.addEventListener('click', () => {
    if (currentIndex > 0) { // Asegúrate de que no se pase de atrás
        currentIndex--;
        updateCarousel();
    }
});

function updateCarousel() {
    const offset = -currentIndex * (100 / 3); // Ajusta el desplazamiento
    imagesContainer.style.transform = `translateX(${offset}%)`;
    updateButtonStates(); // Llama a la función para actualizar los estados de los botones
}


// DESCONOZCO JS ASI QUE NO SE SI LE MUEVO A ALGO SE INTERRUMPE ALGO 
function updateButtonStates() {
    // Deshabilitar el botón "prev" si estamos en la primera imagen
    if (currentIndex === 0) {
        prevButton.classList.add('disabled');
        prevButton.style.backgroundImage = "url('./IMG/IzquierdaGris.png')"; // Cambia a gris
    } else {
        prevButton.classList.remove('disabled');
        prevButton.style.backgroundImage = "url('./IMG/home/IzquierdaAzul.png')"; // Regresa a azul
    }

    // Deshabilitar el botón "next" si estamos en la última imagen
    if (currentIndex >= totalImages - 3) {
        nextButton.classList.add('disabled');
        nextButton.style.backgroundImage = "url('./IMG/DerechaGris.png')"; // Cambia a gris
    } else {
        nextButton.classList.remove('disabled');
        nextButton.style.backgroundImage = "url('./IMG/home/DerechaAzul.png')"; // Regresa a azul
    }
}


// Inicializar los estados de los botones al cargar la página
updateButtonStates();



// PREGUNTAS



// PARA QUE AL SELECCIONAR UN BOTON SE DESPLIEGUE EL PARRAFO
const botones = document.querySelectorAll('.questions_title');


botones.forEach((boton) => {
    boton.addEventListener('click', function() {
        // Encontrar el <p> correspondiente dentro de la misma pregunta
        const contenido = this.closest('.pregunta').querySelector('.respuesta');

        // Alternar la visibilidad del contenido
        if (contenido.style.display === 'none' || contenido.style.display === '') {
            contenido.style.display = 'block'; // Mostrar el contenido
            this.classList.remove('icono-abajo'); // Remover icono de abajo
            this.classList.add('icono-arriba'); // Agregar icono de arriba
        } else {
            contenido.style.display = 'none'; // Ocultar el contenido
            this.classList.remove('icono-arriba'); // Remover icono de arriba
            this.classList.add('icono-abajo'); // Agregar icono de abajo
        }
    });
});


// CODIGO DE MARCELA "CREO QUE LOGRÉ HACER QUE LA IMAGEN DIERA UNA VUELTA 180° (NO ESTOY SEGURO)"

(function() {
    // Seleccionamos todos los elementos que tienen la clase 'questions_title' y los convertimos en un array
    const titleQuestions = [...document.querySelectorAll('.questions_title')];
    
    // Imprimimos en la consola el array de títulos de preguntas para verificar que los seleccionamos correctamente
    console.log(titleQuestions);

    // Recorremos cada elemento del array de títulos
    titleQuestions.forEach(question => {
        // Añadimos un evento 'click' a cada título de pregunta
        question.addEventListener('click', () => {
            // Inicializamos una variable 'height' con valor 0, que usaremos para almacenar la altura de la respuesta
            let height = 0;

            // Obtenemos el siguiente elemento hermano del título, que es el párrafo que contiene la respuesta
            let answer = question.nextElementSibling;

            // Obtenemos el contenedor superior de la pregunta, que puede ser usado para aplicar estilo adicional (padding, márgenes, etc.)
            let addPadding = question.parentElement.parentElement;

            
            // Alternamos la clase 'questions_arrow--rotate' en la flecha (primer hijo del título) para rotarla (hacia arriba o abajo)
            question.children[0].classList.toggle('questions_arrow--rotate');

            // Si la altura actual de la respuesta es 0, significa que está oculta, así que calculamos su altura total para desplegarla
            if (answer.clientHeight === 0) {
                height = answer.scrollHeight;
            }

            // Asignamos la altura calculada a la respuesta para desplegarla o la dejamos en 0 para ocultarla
            answer.style.height = `${height}px`;
        });
    });
})();
