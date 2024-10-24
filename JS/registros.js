// Obtener el checkbox y el botón de submit
document.addEventListener("DOMContentLoaded", function() {
    const checkbox = document.querySelector('.validar');
    const submitButton = document.querySelector('input[type="submit"]');

    // Al cargar la página, el botón está deshabilitado
    submitButton.disabled = true;

    // Cambia el estado del botón cuando el checkbox es seleccionado/deseleccionado
    checkbox.addEventListener('change', function() {
        if (this.checked) {
            submitButton.disabled = false; // Habilitar el botón
            submitButton.classList.add('enabled'); // Añadir clase para estilos
        } else {
            submitButton.disabled = true; // Deshabilitar el botón
            submitButton.classList.remove('enabled'); // Remover clase para estilos
        }
    });
});