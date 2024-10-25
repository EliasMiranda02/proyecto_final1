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
  
