<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Vuelo</h1>
      </div>
      <div class="modal-body custom-scroll">
        <form id="editarForm" action="controlador/edit_vuelo.php" method="post">
          <input type="hidden" id="id_vuelo_editar" name="id_vuelo_editar">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="no_vuelo" name="no_vuelo" required>
            <label for="floatingInput" class="form-label">Numero de Vuelo</label>
          </div>
          <div class="form-floating mb-3">
            <textarea maxlength="50" rows="2" class="form-control" id="origen" name="origen" required></textarea>
            <label for="floatingInput" class="form-label">Origen</label>
          </div>
          <div class="form-floating mb-3">
            <textarea maxlength="50" rows="2" class="form-control" id="destino" name="destino" required></textarea>
            <label for="floatingInput" class="form-label">Destino</label>
          </div>

           Fecha y Hora de Salida:
          <div class="input-group mb-3">
            <input type="date" aria-label="First name" class="form-control" id="date_salida" name="date_salida" required>
            <input type="time" class="form-control" id="time_salidas" name="time_salida" required>
          </div>

          Fecha y Hora de Llegada:
          <div class="input-group mb-3">
            <input type="date" aria-label="First name" class="form-control" id="date_llegada" name="date_llegada" required>
            <input type="time" class="form-control" id="time_llegadas" name="time_llegada" required>
          </div>

          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="precio" name="precio" maxlength="8" required>
            <label for="floatingInput" class="form-label">Precio de Vuelo</label>
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

<style>
  .custom-scroll {
    max-height: 400px;
    /* Ajusta la altura según tus necesidades */
    overflow-y: auto;
  }
</style>


<script>
  const precioInput = document.getElementById('precio');

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