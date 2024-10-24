<div class="modal fade" id="eliminar" tabindex="-1" aria-labelledby="eliminar" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="eliminar">Confirmar eliminación</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
        ¿QUIERES ELIMINARLO?
      </div>

      <div class="modal-footer">
        <form action="controlador/eliminar_usuario.php" method="post">
            <input type="hidden" name="id" id="id">
            <div class="mb-3">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Eliminar</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
