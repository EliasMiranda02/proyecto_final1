<div class="modal fade" id="banco" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header  bg-success text-white ">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">Datos Bancarios</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body custom-scroll">
                <p id="idClienteDisplay">ID Cliente: </p>
                <div id="datosBancarios">
                    <!-- Aquí se llenarán los datos bancarios -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
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
