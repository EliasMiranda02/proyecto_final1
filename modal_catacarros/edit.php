<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5">Editar Usuario</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="controlador/edit_catacarro.php" method="post">
                    <input type="hidden" id="id_carro_editar" name="id_carro_editar">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="marcas" name="marcas" required>
                        <label for="floatingInput">Marca del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="modelos" id="modelos" required>
                        <label for="floatingInput">Modelo del carro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="ano_fabricacion" id="ano_fabricacion" required>
                        <label for="floatingInput">Año de año fabricación</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="colores" id="colores" required>
                        <label for="floatingInput">Color del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="placas" id="placas" required>
                        <label for="floatingInput">Placa del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" name="precios" id="precios" required>
                        <label for="floatingInput">Precio de la renta del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="cantidades" name="cantidades" required>
                        <label for="floatingInput">Cantidad de dias para la renta</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" step="1" class="form-control" id="capacidades" name="capacidades" required>
                        <label for="nip">Capacidad</label>
                    </div>
                    <div class="input-group mb-3" required>
                        <span class="input-group-text">Estado</span>
                        <input type="text" class="form-control" id="estados" disabled>
                        <select id="estado" name="estado" class="form-select">
                            <option value="Activo">Activo</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-warning" id="confirmarEditar" onclick="document.getElementById('editarForm').submit();">Guardar Cambios</button>
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