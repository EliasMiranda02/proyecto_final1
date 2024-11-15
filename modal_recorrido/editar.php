<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/edit_recorrido.php" method="post">
          <input type="hidden" id="id_recorrido_editar" name="id_recorrido_editar">
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="date_salida" name="date_salida">
            <label for="floatingInput">Fecha Salida</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="date_llegada" name="date_llegada" required>
            <label for="floatingInput" class="form-label">Fecha Llegada</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="boleto" name="boleto" required>
            <label for="floatingInput" class="form-label">Precio del Boleto</label>
          </div>
          <div class="input-group">
            <span class="input-group-text">Estado</span>
            <input type="text" aria-label="First name" class="form-control" id="estados" disabled>
            <select id="estado" name="estado" class="form-select">
              <option value="Activo">Activo</option>
              <option value="Pendiente">Pendiente</option>
              <option value="Inactivo">Inactivo</option>
            </select>
          </div>

        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-warning" id="confirmarEditar" onclick="document.getElementById('editarForm').submit();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<script>
    const precioInput = document.getElementById('boleto');

    // Función para formatear el valor a moneda
    function formatCurrency(value) {
        return value.toLocaleString('es-MX', {
            style: 'currency',
            currency: 'MXN'
        });
    }

    // Formatear como moneda cuando el campo pierde el foco
    precioInput.addEventListener('blur', function() {
        let valor = parseFloat(this.value.replace(/[^0-9.-]/g, '').replace(',', ''));
        if (!isNaN(valor)) {
            this.value = formatCurrency(valor);
        }
    });

    // Restringir la entrada a solo números y el punto decimal
    precioInput.addEventListener('input', function() {
        // Guardar el valor actual sin formato
        let rawValue = this.value.replace(/[^0-9\.]/g, ''); // solo números y punto

        // Evitar más de un punto decimal
        if (rawValue.split('.').length > 2) {
            rawValue = rawValue.slice(0, -1);
        }

        // Establecer el valor sin formato para que el cursor esté en la posición correcta
        this.value = rawValue;
    });
</script>