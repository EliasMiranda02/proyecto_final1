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
            <input type="number" min="100" max="15000" step="0.01" class="form-control" id="boleto" name="boleto" required>
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