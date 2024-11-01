
    btnEditar.addEventListener('click', function(event) {
        const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

        // Prevenir el comportamiento por defecto del botón
        event.preventDefault();

        // Comprobar si hay exactamente un checkbox seleccionado
        if (checkedCheckboxes.length === 1) {
            const id = checkedCheckboxes[0].value;
            const row = checkedCheckboxes[0].closest('tr');

            // Obtener los datos de la fila
            const descripcion = row.cells[2].innerText;
            const precio_aproximado = row.cells[3].innerText;
            const duracion_horas = row.cells[4].innerText;
            const ubicacion = row.cells[5].innerText; // Suponiendo que la contraseña está en la columna 9
            const clasificacion = row.cells[6].innerText; // Ajusta el índice según tu tabla
            const cantidad_maxima = row.cells[7].innerText;

            // Llenar los campos del modal
            document.getElementById('id_excursion_editar').value = id;
            document.getElementById('descripcion').value = descripcion;
            document.getElementById('precio_aproximado').value = precio_aproximado;
            document.getElementById('duracion_horas').value = duracion_horas;
            document.getElementById('ubicacion').value = ubicacion;
            document.getElementById('clasificacion').value = clasificacion;
            document.getElementById('cantidad_maxima').value = cantidad_maxima;

            // Abrir el modal
            $('#editar').modal('show');
        } else {
            // Solo mostrar la alerta, sin abrir el modal
            alert('Por favor, selecciona un único registro para editar.');
        }
    });

    // Enviar el formulario al hacer clic en "Guardar Cambios"
    document.getElementById('confirmarEditar').addEventListener('click', function() {
        document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
    });

// Para eliminar
document.getElementById('selectAll').addEventListener('change', function() {
    let checkboxes = document.querySelectorAll('input[name="ids[]"]');
    checkboxes.forEach(checkbox => checkbox.checked = this.checked);
});

// Oculta el mensaje después de 5 segundos
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos

document.getElementById('searchFormExcursion').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }

    fetch('controlador/buscar_excursion.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Excursiones table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});