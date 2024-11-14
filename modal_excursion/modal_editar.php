<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Excursion</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="./controlador/editar_excursion.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_excursion_editar" name="id_excursion_editar">
                    <center>
                        <img id="im" src="" alt="Vista previa de la imagen" style="display: block; max-width: 200px; margin-top: 10px; border-radius: 10%;">
                    </center>
                    <div class="form-group mb-3">
                        <label for="im" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="sellImg" name="sellImg">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="text" id="precio" name="precio" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="duracion_horas" class="form-label">Duracion por Horas</label>
                        <input type="number" id="duracion_horas" name="duracion_horas" class="form-control" max="24" min="1" required>
                    </div>

                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicacion</label>
                        <textarea name="ubicacion" id="ubicacion" class="form-control" rows="2" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="clasificar" class="form-label">Clasificacion</label>
                        <select id="clasificaciones" name="clasificacion" class="form-select" required>
                            <option value="Aventura y Naturaleza">Aventura y Naturaleza</option>
                            <option value="Historia y Arqueología">Historia y Arqueología</option>
                            <option value="Cultura y Pueblos Mágicos">Cultura y Pueblos Mágicos</option>
                            <option value="Playas y Ritmos del Sol">Playas y Ritmos del Sol</option>
                        </select>
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