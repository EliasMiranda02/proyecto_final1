<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Editar Reserva</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="./controlador/editar_reservapa.php" method="post" enctype="multipart/form-data">
                <input type="hidden" id="id_reservapa_editar" name="id_reservapa_editar">

                    <div class="mb-3">
                        <label for="clasificar" class="form-label">Disponibilidad</label>
                        <select id="disponibilidad" name="disponibilidad" class="form-select" required>
                            <option value="Completado">Completado</option>
                            <option value="Reservado">Reservado</option>
                            <option value="Cancelado">Cancelado</option>
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