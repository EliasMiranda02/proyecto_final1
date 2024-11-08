<!-- MODAL PARA EL BOTON DE t_empleado para agregar un nuevo empleado -->
<div class="modal fade" id="agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarlabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h1 class="modal-title fs-5 text-white" id="agregarlabel">Agregar Empleado</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-scroll">

                <form action="./controlador/add_empleado.php" method="post" enctype="multipart/form-data"> <!-- Cambia aquí -->
                    <center><img id="image" src="IMG/logoempleado1.png" alt="Vista previa de la imagen" style="display: block; max-width: 150px; margin-top: 10px; border-radius: 20%;"></center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="sellImg" name="sellImg">
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="25" class="form-control" id="nombre" name="nombre" required>
                        <label for="nombre">Nombre</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="25" class="form-control" name="nombre_usuario" id="nombre_usuario" required>
                        <label for="nombre_usuario">Nombre de Usuario</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" maxlength="35" class="form-control" name="apaterno" id="apaterno" required>
                        <label for="apaterno">Apellido Paterno</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="35" class="form-control" name="amaterno" id="amaterno" required>
                        <label for="amaterno">Apellido Materno</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" maxlength="100" class="form-control" name="email" id="email" required>
                        <label for="email">Correo Electrónico</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" maxlength="8" class="form-control" name="contraseña1" id="contraseña1" required>
                        <label for="pass1">Contraseña</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="password" maxlength="8" class="form-control" name="contraseña2" id="contraseña2" required>
                        <label for="pass2">Confirma Contraseña</label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Número Telefónico</span>
                        <select name="opcion" id="opcion" class="form-select" required>
                            <option value="961">961</option>
                            <option value="664">664</option>
                            <option value="229">229</option>
                            <option value="81">81</option>
                            <option value="33">33</option>
                        </select>
                        <input type="text" class="form-control" id="numero" name="numero" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" maxlength="4" class="form-control" id="nip" name="nip" pattern="^\d{1,4}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 4)">
                        <label for="nip">NIP</label>
                    </div>

                    <div class="col-md mb-3">
                        <div class="form-floating">
                            <select name="cargo" class="form-select" id="cargo" required>
                                <option value="Administrativo">Administrativo</option>
                                <option value="Asesor de Viajes">Asesor de Viajes</option>
                                <option value="Guia Turistico">Guia Turistico</option>
                            </select>
                            <label for="cargo">Cargo del Empleado</label>
                        </div>
                    </div>
                    <div class="col-md mb-3">
                        <div class="form-floating">
                            <select name="disponibilidad" class="form-select" id="disponibilidad" required>
                                <option value="">Seleccionar...</option>
                                <option value="Disponible">Disponible</option>
                                <option value="No disponible">No Disponible</option>
                                <option value="Reservado">Reservado</option>
                            </select>
                            <label for="disponibilidad">Disponibilidad del Empleado</label>
                        </div>
                    </div>

                    <div class="">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>

                </form>
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