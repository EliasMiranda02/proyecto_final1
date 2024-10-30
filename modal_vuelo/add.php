<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white">Agregar Nuevo Vuelo</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="controlador/guardar_vuelo.php" method="post" enctype="multipart/form-data">

                    <div class="mb-3">
                        <label for="nombre_hotel" class="form-label">Numero del Vuelo</label>
                        <input type="text" class="form-control" id="no_vuelo" name="no_vuelo" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Origen</label>
                        <input type="text" class="form-control" id="origen" name="origen">
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Destino</label>
                        <input type="text" class="form-control" id="destino" name="destino">
                    </div>

                    <div class="mb-3">
                        <label for="numero_habitaciones" class="form-label">Fecha Salida</label>
                        <input type="datetime-local" class="form-control" id="date_salida" name="date_salida" required>
                    </div>

                    <div class="mb-3">
                        <label for="correo_electronico" class="form-label">Fecha de LLegada</label>
                        <input type="datetime-local" class="form-control" id="date_llegada" name="date_llegada" required>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Precio del Vuelo</label>
                        <input type="text" class="form-control" id="precio" name="precio">
                    </div>


                    <div class="">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>Guardar</button>
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