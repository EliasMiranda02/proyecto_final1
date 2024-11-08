<!-- Modal -->
<div class="modal fade" id="añadirmodal" tabindex="-1" aria-labelledby="añadirmodalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Hotel</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-scroll">
                <form action="./controlador/guardar_hotel.php" method="post" enctype="multipart/form-data">

                    <center><img id="image" src="IMG/hotel.png" alt="Vista previa de la imagen" style="display: block; height:150px; max-width: 200px; margin-top: 10px; border-radius: 10%;"></center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="selImg" name="selImg">
                    </div>

                    <div class="mb-3">
                        <label for="nombre_hotel" class="form-label">Nombre del Hotel</label>
                        <input type="text" name="nombre_hotel" id="nombre_hotel" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="direccion" class="form-label">Dirección</label>
                        <textarea name="direccion" id="direccion" class="form-control" rows="2" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="clave_lada" class="form-label">Clave Lada</label>
                        <select id="clave_lada" name="clave_lada" class="form-select" required>
                            <option value="">Seleccionar...</option>
                            <option value="961">961</option>
                            <option value="967">967</option>
                            <option value="664">664</option>
                            <option value="229">229</option>
                            <option value="81">81</option>
                            <option value="33">33</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="telefono" class="form-label">Telefono</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" pattern="^\d{1,7}$" required oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 7)">
                    </div>
                    <div class="mb-3">
                        <label for="correo_electronico" class="form-label">Correo Electrónico</label>
                        <input type="email" id="correo_electronico" name="correo_electronico" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="numero_habitaciones" class="form-label">Numero de Habitaciones</label>
                        <input type="number" id="numero_habitaciones" name="numero_habitaciones" class="form-control" required min="1">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio_noche" class="form-label">Precio por Noche</label>
                        <input type="number" id="precio_noche" name="precio_noche" class="form-control" required min="100" step="0.01">
                    </div>
                    <div class="mb-3">
                        <label for="calificacion" class="form-label">Calificación</label>
                        <input type="number" id="calificacion" name="calificacion" class="form-control" required min="1">
                    </div>
                    <br>
                    <div class="">
                        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk"></i>  Guardar</button>
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