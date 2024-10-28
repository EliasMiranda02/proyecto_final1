<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Hotel</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="../controlador/hotel/editar_hotel.php" method="post">
          <input type="hidden" id="id_hotel_editar" name="id_hotel_editar">
          <div class="mb-3">
            <label for="nombre_hotel" class="form-label">Nombre del Hotel</label>
            <input type="text" class="form-control" id="nombre_hotel" name="nombre_hotel" required>
          </div>
          <div class="mb-3">
          <label for="clave_lada" class="form-label">Clave Lada</label>
          <Select id="clave_lada" name="clave_lada" class="form-control">
                    <option value="961">961</option>
                    <option value="664">664</option>
                    <option value="229">229</option>
                    <option value="81">81</option>
                    <option value="33">33</option>
                </Select>
          </div>
          <div class="mb-3">
            <label for="telefono" class="form-label">Telefono</label>
            <input type="text" class="form-control" id="telefono" name="telefono" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
          </div>
          <div class="mb-3">
            <label for="correo_electronico" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="correo_electronico" name="correo_electronico" required>
          </div>
          <div class="mb-3">
            <label for="numero_habitaciones" class="form-label">Numero de Habitaciones</label>
            <input type="text" class="form-control" id="numero_habitaciones" name="numero_habitaciones" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
          </div>
          <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" required>
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
