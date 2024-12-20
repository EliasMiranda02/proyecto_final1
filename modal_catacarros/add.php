<!-- MODAL PARA EL BOTON DE t_empleado para agregar un nuevo empleadoo -->
<div class="modal fade" id="agregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="agregarlabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header bg-success ">
                <h1 class="modal-title fs-5 text-white" id="agregarlabel">Agregar Carro</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-scroll">

                <form action="controlador/add_catacarro.php" method="post" enctype="multipart/form-data"> <!-- Cambia aquí -->

                    <center><img id="image" src="IMG/Imagen1.png" alt="Vista previa de la imagen" style="display: block; max-width: 200px; margin-top: 10px; border-radius: 60%;"></center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="selImg" name="selImg" required>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" maxlength="6" class="form-control" name="modelo" id="modelo" required>
                        <label for="nombre_usuario">Modelo del carro</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" maxlength="8" class="form-control" name="precio" id="precio" oninput="updateCurrency(this)" required>
                        <label for="pass1">Precio de la renta del carro</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" step="1" min="1" max="20" class="form-control" id="capacidad" name="capacidad" required>
                        <label for="nip">Capacidad</label>
                    </div>
                    <div class="input-group mb-3" required>
                        <span class="input-group-text">Estado</span>
                        <select id="estado" name="estado" class="form-select">
                            <option value="Activo">Activo</option>
                            <option value="Pendiente">Pendiente</option>
                            <option value="Inactivo">Inactivo</option>
                        </select>
                    </div>

                    <div class="">
                        <button type="submit" name="registrar" class="btn btn-primary">Guardar</button>
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

<script>
    // Función para formatear el valor como moneda
    function formatCurrency(value) {
        return value.toLocaleString("es-MX", {
            style: "currency",
            currency: "MXN"
        });
    }

    // Función para convertir el valor del input a número, eliminando caracteres de formato
    function parseCurrency(value) {
        return parseFloat(value.replace(/[^0-9.-]+/g, "")) || 0;
    }

    // Actualizar el valor del campo de texto como moneda
    function updateCurrency(input) {
        let value = input.value.replace(/[^0-9.-]/g, ''); // Eliminar caracteres no numéricos
        input.value = value; // Mantener el valor sin formato para edición

        // Si el valor tiene más de 0, agregar formato cuando se termine de editar
        input.addEventListener('blur', function() {
            let numValue = parseCurrency(input.value);
            input.value = formatCurrency(numValue); // Convertir a moneda
        });
    }
</script>