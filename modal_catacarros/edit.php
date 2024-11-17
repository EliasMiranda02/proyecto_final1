<!-- Modal de editar -->
<div class="modal fade" id="editar" tabindex="-1" aria-labelledby="editarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-warning">
                <h1 class="modal-title fs-5">Editar Usuario</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form id="editarForm" action="controlador/edit_catacarro.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="id_carro_editar" name="id_carro_editar">
                    <center>
                        <!-- Imagen mostrada en el modal, cambiar cuando se seleccione un archivo -->
                        <img id="imagen" src="" alt="Vista previa de la imagen" style="display: block; max-width: 150px; margin-top: 10px; border-radius: 10%;">
                    </center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="sellImg" name="selImg" required>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" maxlength="6" class="form-control" name="modelos" id="modelos" required>
                        <label for="floatingInput">Modelo del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="8" class="form-control" name="precios" id="precios" required>
                        <label for="floatingInput">Precio de la renta del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" step="1" min="1" max="20" class="form-control" id="capacidades" name="capacidades" pattern="^\d{1,2}$" oninput="this.value = this.value.replace(/[^0-9]/g, '').slice(0, 2)" required>
                        <label for="nip">Capacidad</label>
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text">Estado</span>
                        <input type="text" class="form-control" id="estados" disabled>
                        <select id="Sestados" name="estado" class="form-select">
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
        overflow-y: auto;
    }
</style>

<script>
    const precioInput = document.getElementById('precios');

    // Función para formatear el valor a moneda
    function formatCurrency(value) {
        return value.toLocaleString('es-MX', {
            style: 'currency',
            currency: 'MXN'
        });
    }

    // Formatear como moneda cuando el campo pierde el foco
    precioInput.addEventListener('blur', function() {
        let valor = parseFloat(this.value.replace(/[^0-9.-]/g, '').replace(',', ''));
        if (!isNaN(valor)) {
            this.value = formatCurrency(valor);
        }
    });

    // Restringir la entrada a solo números y el punto decimal
    precioInput.addEventListener('input', function() {
        // Guardar el valor actual sin formato
        let rawValue = this.value.replace(/[^0-9\.]/g, ''); // solo números y punto

        // Evitar más de un punto decimal
        if (rawValue.split('.').length > 2) {
            rawValue = rawValue.slice(0, -1);
        }

        // Establecer el valor sin formato para que el cursor esté en la posición correcta
        this.value = rawValue;
    });
</script>