const btnAbrirModal = document.querySelector("#btn-abrir-modal");
const btnCerrarModal = document.querySelector("#btn-cerrar-modal");
const modal = document.querySelector("#modal");

const btnEquipoTrabajo = document.querySelector("#btn-equipo-trabajo");
const modalNombre = document.querySelector("#modal-nombre");
const btnCerrarModalNombre = document.querySelector("#btn-cerrar-modal-nombre");
const formNip = document.querySelector("#form-nip");
const nipInput = document.querySelector("#nip");
const errorMessage = document.querySelector("#error-message");

// NIP predeterminado
const nipPredefinido = "12345678";

// Abrir el modal principal
btnAbrirModal.addEventListener("click", () => {
    modal.showModal();
});

// Cerrar el modal principal
btnCerrarModal.addEventListener("click", () => {
    modal.close();
});

// Abrir el modal de nombre al seleccionar "Equipo de Trabajo"
btnEquipoTrabajo.addEventListener("click", () => {
    modal.close();  // Cierra el modal principal
    modalNombre.showModal();  // Abre el modal de nombre
});

// Cerrar el modal de nombre
btnCerrarModalNombre.addEventListener("click", () => {
    modalNombre.close();
});

// Verificar el NIP al enviar el formulario
formNip.addEventListener("submit", (e) => {
    e.preventDefault();  // Evitar el envío del formulario por defecto

    const nipIngresado = nipInput.value;

    if (nipIngresado === nipPredefinido) {
        // NIP correcto, redirigir al usuario
        window.location.href = "registro_empleado.php"; // Cambiar a la URL del archivo que deseas
    } else {
        // NIP incorrecto, mostrar mensaje de error
        errorMessage.style.display = "block";
    }
});
