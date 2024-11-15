<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white">Agregar Paquete</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form action="controlador/add_paquete.php" method="post" enctype="multipart/form-data">

                    <center><img id="image1" src="IMG/Imagen1.png" alt="Vista previa de la imagen" style="display: block; max-width: 150px; margin-top: 10px; border-radius: 20%;"></center>
                    <div class="form-group mb-3">
                        <label for="imagen" class="form-label">Imagen</label>
                        <input class="form-control" type="file" id="sellImg" name="sellImg" required>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="numero" name="numero" required>
                        <label for="floatingInput" class="form-label">Numero del Paquete</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" maxlength="50" class="form-control" id="nombres" name="nombres" required>
                        <label for="floatingInput" class="form-label">Nombre del Paquete</label>
                    </div>

                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="precios" name="precios" oninput="updateCurrency(this)" required>
                        <label for="floatingInput" class="form-label">Precio del paquete (aprox)</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="number" max="7" min="1" class="form-control" id="duracion" name="duracion" required>
                        <label for="floatingInput" class="form-label">Duración del paquete (dias)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" maxlength="50" id="destino" name="destino" rows="3" required></textarea>
                        <label for="floatingInput" class="form-label">Destino</label>
                    </div>

                    <div class="">
                        <button type="submit" name="registrar" class="btn btn-success">
                            <i class="fa-solid fa-file-circle-plus"></i> Agregar
                        </button>
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

<!-- PARA QUE EL INPUT DE PRECIO TENGA EL FORMATO MODENA -->
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