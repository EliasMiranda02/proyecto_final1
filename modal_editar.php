<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5">Editar Usuario</h1>
      </div>
      <div class="modal-body">
        <form id="editarForm" action="controlador/editar_usuario.php" method="post">
          <input type="hidden" id="id_usuario_editar" name="id_usuario_editar">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
          </div>
          <div class="mb-3">
            <label for="apellido_materno" class="form-label">Apellido Materno</label>
            <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required>
          </div>
          <div class="mb-3">
            <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
            <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="pass" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="pass" name="pass" required>
          </div>
          <div class="mb-3">
            <label for="numero" class="form-label">Número de celular</label>
            <input type="text" class="numero" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
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
