<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/" method="post">
          <input type="hidden" id="id_recorrido_editar" name="id_recorrido_editar">
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="date_salida" name="date_salida">
            <label for="floatingInput">Fecha Salida</label>
          </div>
          <div class="form-floating mb-3">
              <input type="datetime-local" class="form-control" id="destino" name="date_llegada" required>
              <label for="floatingInput" class="form-label">Fecha Llegada</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="boleto" name="boleto" required>
              <label for="floatingInput" class="form-label">Precio del Boleto</label>
          </div>
          <div class="form-floating mb-3">
              <input type="text" class="form-control" id="estado" name="estado" required>
              <label for="floatingInpu" class="form-label">Estado</label>
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
