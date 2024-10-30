<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h1 class="modal-title fs-5 text-white">Agregar Ruta</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/add_rutas.php" method="post" enctype="multipart/form-data">
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="origen" name="origen" required>
            <label for="floatingInput">Origen</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="destino" name="destino" required>
            <label for="floatingInput" class="form-label">Destino</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="distancia" name="distancia"required>
            <label for="floatingInput" class="form-label">Distancia (km)</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="duracion" name="duracion"required>
            <label for="floatingInpu" class="form-label">Duracion</label>
          </div>
          <div class="form-floating mb-3">
            <input type="text" class="form-control" id="matricula" name="matricula" required>
            <label for="floatingInpu" class="form-label">Matricula</label>
          </div>

          <div class="mb-3">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
          </div>

        </form>
      </div>
    </div>
  </div>
</div>