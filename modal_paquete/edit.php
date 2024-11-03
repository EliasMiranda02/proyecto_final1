<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-warning">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body custom-scroll">
        <form id="editarForm" action="controlador/edit_paquete.php" method="post">
          <input type="hidden" id="id_paquete_editar" name="id_paquete_editar">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="nombres" name="nombres" required>
            <label for="floatingInput" class="form-label">Nombre del Paquete</label>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="precios" name="precios" required>
            <label for="floatingInput" class="form-label">Precio del paquete (aprox)</label>
          </div>
          <div class="form-floating mb-3">
            <input type="number" class="form-control" id="duracion" name="duracion" required>
            <label for="floatingInput" class="form-label">Duración del paquete</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="destino" name="destino" required>
            <label for="floatingInput" class="form-label">Destino</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="fecha_creacion" name="fecha_creacion" disabled>
            <label for="floatingInput" class="form-label">fecha de creación</label>
          </div>
          <div class="form-floating mb-3">
            <input type="datetime-local" class="form-control" id="fecha_modificacion" name="fecha_modificacion" disabled>
            <label for="floatingInput" class="form-label">fecha de modificación</label>
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