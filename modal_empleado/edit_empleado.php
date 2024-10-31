<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Empleado</h1>
            </div>
            <div class="modal-body">

                <form id="editarForm" action="controlador/editar_empleado.php" method="post">
                    <input type="text" id="id_empleado_editar" name="id_empleado_editar">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label">Apellido</label>
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
                        <label for="text" class="form-label">Contraseña</label>
                        <input type="password" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" id="ladas" name="ladas">
                        <label for="numero" class="form-label">Número de celular</label>
                        <input type="text" class="form-control" id="numero" name="numero" pattern="^\d{1,4}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                    </div>
                    <div class="mb-3">
                        NIP <input type="text" class="form-control" id="nip" name="nip" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero" class="form-label">Cargo</label>
                        <input type="text" aria-label="First name" class="form-control" name="cargo" id="cargo" disabled>
                    </div>
                    
                    <div class="input-group">
                        <span class="input-group-text">Disponibilidad</span>
                        <input type="text" aria-label="First name" class="form-control" name="estados" id="estados" disabled>
                        <select id="estado" name="estado" class="form-select">
                            <option value="Disponible">Disponible</option>
                            <option value="No Disponible">No Disponible</option>
                            <option value="Reservado">Reservado</option>
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