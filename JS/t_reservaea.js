document.getElementById('searchFormReservasea').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);
    const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios
    
    if (queryValue === "") {
        // Si está vacío, usar un valor especial para indicar "todos los registros"
        formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
    }
    fetch('controlador/buscar_reservaea.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Reservaea table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

// SIDEBAR JS

document.querySelector('.menu-icon').addEventListener('click', () => {
    const nav = document.querySelector('nav');
    const overlay = document.querySelector('.overlay');

    nav.classList.toggle('open');
    overlay.classList.toggle('active');
});

document.querySelector('.overlay').addEventListener('click', () => {
    const nav = document.querySelector('nav');
    const overlay = document.querySelector('.overlay');

    nav.classList.remove('open');
    overlay.classList.remove('active');
});
btnEditar.addEventListener('click', function(event) {
    const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

    // Prevenir el comportamiento por defecto del botón
    event.preventDefault();

    // Comprobar si hay exactamente un checkbox seleccionado
    if (checkedCheckboxes.length === 1) {
        const id = checkedCheckboxes[0].value;
        const row = checkedCheckboxes[0].closest('tr');

        // Obtener los datos de la fila
        const disponibilidad = row.cells[4].innerText;

        // Llenar los campos del modal
        document.getElementById('id_reservaea_editar').value = id;
        document.getElementById('disponibilidad').value = disponibilidad;

        // Abrir el modal
        $('#editar').modal('show');
    } else {
        // Solo mostrar la alerta, sin abrir el modal
        alert('Por favor, selecciona un único registro para editar.');
    }
});

// Enviar el formulario al hacer clic en "Guardar Cambios"
document.getElementById('confirmarEditar').addEventListener('click', function () {
document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
});
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos