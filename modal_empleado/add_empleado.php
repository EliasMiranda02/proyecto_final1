
<div class="modal fade" id="agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white" id="staticBackdropLabel">Agregar Empleado</h1>
            </div>

            <form action="controlador/INSERT_INTO/t_add_empleado.php" method="POST">
                <div class="modal-body custom-scroll">
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" name="nombre" required>
                        <label for="floatingInput">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingUsuario" name="nombre_usuario" required>
                        <label for="floatingUsuario">Nombre Usuario</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingApellidoMaterno" name="apaterno" required>
                        <label for="floatingApellidoMaterno">Apellido Paterno</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingApellidoPaterno" name="amaterno" required>
                        <label for="floatingApellidoPaterno">Apellido Materno</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="floatingCorreo" name="email" required>
                        <label for="floatingCorreo">Correo electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPassword" name="contraseña1" required>
                        <label for="floatingPassword">Contraseña</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="floatingPasswordConfirm" name="contraseña2" required>
                        <label for="floatingPasswordConfirm">Confirma Contraseña</label>
                    </div>
                    <div class="input-group">
                        <span class="input-group-text">Número Telefónico</span>
                        <select name="opcion" class="form-control" required>
                            <option value="961">961</option>
                            <option value="664">664</option>
                            <option value="229">229</option>
                            <option value="81">81</option>
                            <option value="33">33</option>
                        </select>
                        <input type="text" class="form-control" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    </div>
                    <br>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nip" name="nip" pattern="^\d{1,4}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                        <label for="nip">NIP</label>
                    </div>
                    <div class="form-floating mb-3">
                        <select name="cargo" class="form-control" required>
                            <option value="Administrativo">Administrativo</option>
                            <option value="Asesor de Viajes">Asesor de Viajes</option>
                            <option value="Guía Turístico">Guía Turístico</option>
                        </select>
                        <label for="cargo">Cargo del Empleado</label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" name="registrar" class="btn btn-primary">Guardar</button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    /* Estilo para limitar la altura del modal y habilitar el scroll */
    .custom-scroll {
        max-height: 400px;
        /* Ajusta la altura según tus necesidades */
        overflow-y: auto;
    }
</style>
