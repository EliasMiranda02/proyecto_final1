<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Excursion</h1>
            </div>
            <div class="modal-body">
                <form id="editarForm" action="./controlador/editar_excursion.php" method="post">
                    <input type="hidden" id="id_excursion_editar" name="id_excursion_editar">

                    
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precio_aproximado" class="form-label">Precio Aproximado</label>
                        <input type="number" id="precio_aproximado" name="precio_aproximado" class="form-control" required min="100" step="0.01">
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
                    <div class="mb-3">
                        <label for="cantidad_maxima" class="form-label">Cantidad Maxima de Personas</label>
                        <input type="number" id="cantidad_maxima" name="cantidad_maxima" class="form-control" required min="2">
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