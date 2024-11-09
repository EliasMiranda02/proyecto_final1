<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/edit_ruta.php" method="post">
          <input type="hidden" id="id_ruta_editar" name="id_ruta_editar">
          <div class="form-floating mb-3">
            <input type="text" maxlength="50" class="form-control" id="origen" name="origen" required>
            <label for="floatingInput">Origen</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" maxlength="50" class="form-control" id="destino" name="destino" required>
              <label for="floatingInput" class="form-label">Destino</label>
          </div>
          <div class="form-floating mb-3">
              <input type="number" min="1" max="15000" step="0.01" class="form-control" id="distancia" name="distancia" required>
              <label for="floatingInput" class="form-label">Distancia</label>
          </div>
          <div class="form-floating mb-3">
              <input type="number" min="1" max="15000" step="0.01" class="form-control" id="duracion" name="duracion" required>
              <label for="floatingInput" class="form-label">Duracion</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" maxlength="10" class="form-control" id="matricula" name="matricula" required>
              <label for="floatingInput" class="form-label">Matricula</label>
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
