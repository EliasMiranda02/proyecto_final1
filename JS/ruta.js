document.addEventListener('DOMContentLoaded', function() {
    const btnEditar = document.getElementById('btnEditar');
    const checkboxes = document.querySelectorAll('input[name="ids[]"]');

    // Deshabilitar el botón al cargar la página
    btnEditar.disabled = true;

    // Añadir un event listener a cada checkbox
    checkboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            // Obtener el número de checkboxes seleccionados
            const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

            // Habilitar el botón solo si hay exactamente un checkbox seleccionado
            btnEditar.disabled = checkedCount !== 1;
        });
    });

    btnEditar.addEventListener('click', function (event) {

        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const nombre = row.cells[2].innerText; // Asegúrate de que los índices son correctos
            const apellidoMaterno = row.cells[3].innerText;
            const apellidoPaterno = row.cells[4].innerText;
            const email = row.cells[5].innerText; // Verifica el índice
            const numero = row.cells[7].innerText; // Asegúrate de que este es el índice correcto para contraseña
            const pass = row.cells[9].innerText;
            const nip = row.cells[10].innerText; // Ajusta el índice según tu tabla para el número de cédula
            const cargo = row.cells[11].innerText;

            // Llenar los campos del modal
            document.getElementById('id_empleado_editar').value = id;
            document.getElementById('nombre').value = nombre;
            document.getElementById('apellido_materno').value = apellidoMaterno;
            document.getElementById('apellido_paterno').value = apellidoPaterno;
            document.getElementById('email').value = email;
            document.getElementById('pass').value = pass;
            document.getElementById('numero').value = numero; // Cambia el ID si es diferente
            document.getElementById('nip').value = nip;
            document.getElementById('cargo').value = cargo;



            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
        document.getElementById('confirmarEditar').addEventListener('click', function () {
            document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
        });
    });
});
