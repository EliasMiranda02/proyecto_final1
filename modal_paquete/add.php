<div class="modal fade" id="agregar" tabindex="-1" aria-labelledby="agregarLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-success">
                <h1 class="modal-title fs-5 text-white">Agregar Paquete</h1>
            </div>
            <div class="modal-body custom-scroll">
                <form action="controlador/add_paquete.php" method="post" enctype="multipart/form-data">

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                        <label for="floatingInput" class="form-label">Nombre del Paquete</label>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <textarea name="descripcion" id="descripcion" class="form-control" rows="3" required></textarea>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="precios" name="precios" required>
                        <label for="floatingInput" class="form-label">Precio del paquete (aprox)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="number" class="form-control" id="duracion" name="duracion" required>
                        <label for="floatingInput" class="form-label">Duración del paquete</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="destino" name="destino" required>
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