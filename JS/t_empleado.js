document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
  // Escuchar el evento 'shown.bs.modal' en el modal 'eliminar'
  document.addEventListener('DOMContentLoaded', function () {
    var eliminarModal = document.getElementById('eliminar');
    eliminarModal.addEventListener('shown.bs.modal', function (event) {
      var button = event.relatedTarget; // Botón que activó el modal
      var formId = button.getAttribute('data-form-id'); // Obtener el ID del formulario
      // Asignar el ID al botón de eliminación
      var deleteButton = eliminarModal.querySelector('.btn-primary'); // Botón de eliminar
      deleteButton.setAttribute('data-form-id', formId);
    });
  });
  // Para Administradores
document.getElementById('searchForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Administradores table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});

// Para Asesores
document.getElementById('searchFormAsesor').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Asesor table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});
document.getElementById('searchFormGuia').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Guias table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});


setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos

