<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Empleado</h1>
            </div>
            <div class="modal-body custom-scroll">
                

                <form id="editarForm" action="controlador/editar_empleado.php" method="post" enctype="multipart/form-data">
                
                    <input type="hidden" id="id_empleado_editar" name="id_empleado_editar">
                    <center>
                    <!-- Imagen mostrada en el modal, cambiar cuando se seleccione un archivo -->
                    <img id="imagen" src="" alt="Vista previa de la imagen" style="display: block; max-width: 200px; margin-top: 10px; border-radius: 60%;">
                </center>
                <div class="form-group mb-3">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input class="form-control" type="file" id="selllImg" name="selllImg">
                </div>
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" maxlength="25" class="form-control" id="nombre" name="nombre" required>
                    </div>
                    <div class="mb-3">
                        <label for="nombre_usuario" class="form-label">Nombre de Usuario</label>
                        <input type="text" maxlength="25" class="form-control" id="nombre_usuario" name="nombre_usuario" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido_paterno" class="form-label">Apellido Paterno</label>
                        <input type="text" maxlength="35" class="form-control" id="apellido_paterno" name="apellido_paterno" required>
                    </div>
                    <div class="mb-3">
                        <label for="apellido_materno" class="form-label">Apellido Materno</label>
                        <input type="text" maxlength="35" class="form-control" id="apellido_materno" name="apellido_materno" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo electrónico</label>
                        <input type="email" maxlength="100" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="text" class="form-label">Contraseña</label>
                        <input type="password" maxlength="8" class="form-control" id="pass" name="pass" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Numero de Celular</span>
                        <input type="hidden" class="form-control" id="ladas" name="ladas" disabled>
                        <select class="form-select" name="no_lada" id="no_lada">
                        <option value="">Seleccionar...</option>
                            <option value="961">961</option>
                            <option value="664">664</option>
                            <option value="229">229</option>
                            <option value="81">81</option>
                            <option value="33">33</option>
                        </select>
                        <input type="text" class="form-control" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    </div>
                    <div class="mb-3">
                        NIP <input type="text" maxlength="4" class="form-control" id="nip" name="nip" required>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Cargo</span>
                        <input type="text" aria-label="First name" class="form-control" name="cargo" id="cargo" disabled>
                        <select class="form-select" name="cargos" id="cargos">
                            <option value="Administrativo">Administrativo</option>
                            <option value="Asesor de Viajes">Asesor de Viajes</option>
                            <option value="Guia Turistico">Guia Turistico</option>
                        </select>
                    </div>

                    <div class="input-group">
                        <span class="input-group-text">Disponibilidad</span>
                        <input type="text" aria-label="First name" class="form-control" name="estados" id="estados" disabled>
                        <select id="estado" name="estado" class="form-select">
                        <option value="">Seleccionar...</option>
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
<style>
    .custom-scroll {
        max-height: 400px;
        /* Ajusta la altura según tus necesidades */
        overflow-y: auto;
    }
</style>