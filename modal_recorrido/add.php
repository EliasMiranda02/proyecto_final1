<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white">Agregar Nuevo Recorrido</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="controlador/add_recorrido.php" method="post" enctype="multipart/form-data">

                <div class="input-group mb-3" required>
                        <span class="input-group-text">Rutas</span>
                        <select id="id_ruta" name="id_ruta" class="form-select">
                            <option value="" disabled >Seleccionar...</option>
                            <?php while($row_ruta = $rutas->fetch_assoc()){ ?>
                                <option value="<?php echo $row_ruta["id_ruta"]?>"><?=$row_ruta["id_ruta"]?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" id="date_salida" name="date_salida" required>
                        <label for="floatingInput">Fecha Salida</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="datetime-local" class="form-control" id="date_llegada" name="date_llegada" required>
                        <label for="floatingInput" class="form-label">Fecha Llegada</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="boleto" name="boleto" required>
                        <label for="floatingInput" class="form-label">Precio del Boleto</label>
                    </div>
                    <div class="input-group mb-3" required>
                        <span class="input-group-text">Estado</span>
                        <select id="estado" name="estado" class="form-select">
                            <option value="Activo">Activo</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
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

<style>
    .custom-scroll {
        max-height: 400px;
        /* Ajusta la altura según tus necesidades */
        overflow-y: auto;
    }
</style>