<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/edit_vuelo.php" method="post">
          <input type="hidden" id="id_vuelo_editar" name="id_vuelo_editar">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="no_vuelo" name="no_vuelo" required>
            <label for="floatingInput" class="form-label">Numero de Vuelo</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="origen" name="origen" required>
            <label for="floatingInput" class="form-label">Origen</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="destino" name="destino" required>
            <label for="floatingInput" class="form-label">Destino</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="date_salida" name="date_salida">
            <label for="floatingInput">Fecha Salida</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="date_llegada" name="date_llegada" required>
            <label for="floatingInput" class="form-label">Fecha Llegada</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="precio" name="precio" required>
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