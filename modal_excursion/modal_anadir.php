<!-- Modal -->
<div class="modal fade" id="añadirmodal" tabindex="-1" aria-labelledby="añadirmodalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Excursion</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-scroll">
                <form action="./controlador/guardar_excursion.php" method="post" enctype="multipart/form-data">

                    <center><img id="imagen" src="IMG/excursion.png" alt="Vista previa de la imagen" style="display: block; max-width: 150px; margin-top: 10px; border-radius: 20%;"></center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="selImg" name="selImg">
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio" class="form-label">Precio</label>
                        <input type="number" id="precio" name="precio" class="form-control" required min="100" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="duracion_horas" class="form-label">Duracion por Horas</label>
                        <input type="number" id="duracion_horas" name="duracion_horas" class="form-control" required min="1">
                    </div>
                    <div class="mb-3">
                        <label for="ubicacion" class="form-label">Ubicacion</label>
                        <textarea name="ubicacion" id="ubicacion" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="clasificacion" class="form-label">Clasificacion</label>
                        <select id="clasificacion" name="clasificacion" class="form-select" required>
                            <option value="">Seleccionar...</option>
                            <option value="Aventura y Exploracion">Aventura y Exploracion</option>
                            <option value="Conexión con la Naturaleza">Conexión con la Naturaleza</option>
                            <option value="Cultural e Histórico">Cultural e Histórico</option>
                            <option value="Gastronómica">Gastronómica</option>
                            <option value="Fotográfica">Fotográfica</option>
                        </select>
                    </div>
                    <br>
                    <div class="">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                    </div>
                </form>

            </div>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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

