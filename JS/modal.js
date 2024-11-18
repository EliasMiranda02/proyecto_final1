
// ESTA SECCION ES PARA LAS VENTANAS 



// const btnAbrirModal = document.querySelector("#btn-abrir-modal");
// const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
// const modal = document.querySelector("#modal");

// const btnEquipoTrabajo = document.querySelector("#btn-equipo-trabajo");
// const modalNombre = document.querySelector("#modal-nombre");
// const btnCerrarModalNombre = document.querySelector("#btn-cerrar-modal-nombre");
// const formNip = document.querySelector("#form-nip");
// const nipInput = document.querySelector("#nip");
// const errorMessage = document.querySelector("#error-message");

// // NIP predeterminado
// const nipPredefinido = "12345678";

// // Abrir el modal principal
// btnAbrirModal.addEventListener("click", () => {
//     modal.showModal();
// });

// // Cerrar el modal principal
// btnCerrarModal.addEventListener("click", () => {
//     modal.close();
// });

// // Abrir el modal de nombre al seleccionar "Equipo de Trabajo"
// btnEquipoTrabajo.addEventListener("click", () => {
//     modal.close();  // Cierra el modal principal
//     modalNombre.showModal();  // Abre el modal de nombre
// });

// // Cerrar el modal de nombre
// btnCerrarModalNombre.addEventListener("click", () => {
//     modalNombre.close();
// });

// // Verificar el NIP al enviar el formulario
// formNip.addEventListener("submit", (e) => {
//     e.preventDefault();  // Evitar el envío del formulario por defecto

//     const nipIngresado = nipInput.value;

//     if (nipIngresado === nipPredefinido) {
//         // NIP correcto, redirigir al usuario
//         window.location.href = "registro_empleado.php"; // Cambiar a la URL del archivo que deseas
//     } else {
//         // NIP incorrecto, mostrar mensaje de error
//         errorMessage.style.display = "block";

//         // Ocultar el mensaje de error después de 3 segundos
//         setTimeout(() => {
//             errorMessage.style.display = "none";
//         }, 2000); // 3000 ms = 3 segundos
//     }
// });



// ESTA SECCION ES PARA AGREGAR UN FONDO BORROSO CUANDO SE ABREN LAS VENTANAS


const btnAbrirModal = document.querySelector("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");

const btnEquipoTrabajo = document.querySelector("#btn-equipo-trabajo");
const modalNombre = document.querySelector("#modal-nombre");
const btnCerrarModalNombre = document.querySelector("#btn-cerrar-modal-nombre");
const formNip = document.querySelector("#form-nip");
const nipInput = document.querySelector("#nip");
const errorMessage = document.querySelector("#error-message");

const blurBackground = document.querySelector("#blur-background"); // Fondo borroso

// NIP predeterminado
const nipPredefinido = "12345678";

// Función para mostrar el fondo borroso
function showBlur() {
    blurBackground.style.display = "block";
}

// Función para ocultar el fondo borroso
function hideBlur() {
    blurBackground.style.display = "none";
}

// Abrir el modal principal
btnAbrirModal.addEventListener("click", () => {
    modal.showModal();
    showBlur();
});

// Cerrar el modal principal
btnCerrarModal.addEventListener("click", () => {
    modal.close();
    hideBlur();
});

// Abrir el modal de nombre al seleccionar "Equipo de Trabajo"
btnEquipoTrabajo.addEventListener("click", () => {
    modal.close(); // Cierra el modal principal
    modalNombre.showModal(); // Abre el modal de nombre
});

// Cerrar el modal de nombre
btnCerrarModalNombre.addEventListener("click", () => {
    modalNombre.close();
    hideBlur();
});

// Verificar el NIP al enviar el formulario
formNip.addEventListener("submit", (e) => {
    e.preventDefault(); // Evitar el envío del formulario por defecto

    const nipIngresado = nipInput.value;

    if (nipIngresado === nipPredefinido) {
        // NIP correcto, redirigir al usuario
        window.location.href = "registro_empleado.php"; // Cambiar a la URL del archivo que deseas
    } else {
        // NIP incorrecto, mostrar mensaje de error
        errorMessage.style.display = "block";

        // Ocultar mensaje de error después de 3 segundos
        setTimeout(() => {
            errorMessage.style.display = "none";
        }, 3000);
    }
});
// Oculta el mensaje después de 5 segundos
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos