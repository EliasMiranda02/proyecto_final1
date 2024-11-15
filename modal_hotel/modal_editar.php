<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Hotel</h1>
      </div>
      <div class="modal-body custom-scroll">
        <form id="editarForm" action="./controlador/editar_hotel.php" method="post" enctype="multipart/form-data" >
          <input type="hidden" id="id_hotel_editar" name="id_hotel_editar">

          <center>
            <!-- Imagen mostrada en el modal, cambiar cuando se seleccione un archivo -->
            <img id="imagen" src="" alt="Vista previa de la imagen" style="display: block; height:170px; max-width: 250px; margin-top: 10px; border-radius: 10%;">
          </center>
          <div class="form-group mb-3">
            <label for="imagen" class="form-label">Imagen</label>
            <input class="form-control" type="file" id="selllImg" name="selImgen" required>
          </div>

          <div class="mb-3">
            <label for="nombre_hotel" class="form-label">Nombre del Hotel</label>
            <input type="text" maxlength="50" class="form-control" id="nombre_hotel" name="nombre_hotel" required>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion">
          </div>
          <div class="mb-3">
            <label for="clave_lada" class="form-label">Clave Lada</label>
            <select id="clave_lada" name="clave_lada" class="form-select" required>
              <option value="961">961</option>
              <option value="967">967</option>
              <option value="664">664</option>
              <option value="229">229</option>
              <option value="81">81</option>
              <option value="33">33</option>
            </select>
          </div>

          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
          </div>

          <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo electrónico</label>
            <input type="email" maxlength="100" class="form-control" id="correo_electronico" name="correo_electronico" required>
          </div>

          <div class="mb-3">
            <label for="numero_habitaciones" class="form-label">Número de Habitaciones</label>
            <input type="number" max="80" min="1" class="form-control" id="numero_habitaciones" name="numero_habitaciones" required>
          </div>

          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea type="text" class="form-control" id="descripcion" name="descripcion" rows="3" required></textarea>
          </div>

          <div class="mb-3">
            <label for="precio_noche" class="form-label">Precio por Noche</label>
            <input type="text" class="form-control" id="precio_noche" name="precio_noche" required>
          </div>

          <div class="mb-3">
            <label for="calificacion" class="form-label">Calificación</label>
            <input type="text" class="form-control" id="calificacion" name="calificacion" required>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary" id="confirmarEditar" onclick="document.getElementById('editarForm').submit();">Guardar Cambios</button>
      </div>
    </div>
  </div>
</div>

<style>
    .custom-scroll {
        max-height: 400px;
        overflow-y: auto;
    }
</style>

<script>
  const precioInput = document.getElementById('precio_noche');

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