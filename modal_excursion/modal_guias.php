
<div class="modal fade" id="Guias" tabindex="-1" aria-labelledby="eliminarLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Guias Turisticos</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="d-flex justify-content-center ">
                    <div class="row justify-content-end">

                    </div>
                    <div class=" col-8 p-2">

                        <form id="searchFormGuia" class="mb-3" method="POST" action="controlador/buscar_empleado.php">
                            <input type="hidden" name="cargo" value="Guia Turistico"> <!-- Campo oculto -->
                            <div class="input-group">
                                <select name="campo" class="form-select" required>
                                    <option value="nombre">Nombre</option>
                                    <option value="apellido_paterno">Apellido Paterno</option>
                                    <option value="apellido_materno">Apellido Materno</option>
                                    <option value="email">Email</option>
                                </select>
                                <input type="text" class="form-control" name="query" placeholder="Buscar...">
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info">
                                        <tr>
                                            <th scope="col"><input type="hidden" id="selectAll"></th>
                                            <th scope="col">id_empleado</th>
                                            <th scope="col">nombre</th>
                                            <th scope="col">apellido paterno</th>
                                            <th scope="col">apellido materno</th>
                                            <th scope="col" class="px-3 text-center">email</th>
                                            <th scope="col" class="text-center">clave_lada</th>
                                            <th scope="col">telefono</th>
                                            <th scope="col">fecha_registro</th>
                                            <th scope="col">contraseña</th>
                                            <th scope="col">nombre_usuario</th>
                                            <th scope="col">NIP</th>
                                            <th scope="col">cargo</th>
                                            <th scope="col">disponibilidad</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "modelo/conexion.php";
                                        $cargo = "Guia Turistico";
                                        $sql = $conexion->query("SELECT * FROM empleados where cargo = '$cargo'");
                                        while ($datos = $sql->fetch_object()) { ?>
                                            <tr>
                                                <td><input type="hidden" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
                                                <th scope="row"><?= $datos->id_empleado ?></th>
                                                <td><?= $datos->nombre ?></td>
                                                <td><?= $datos->apellido_paterno ?></td>
                                                <td><?= $datos->apellido_materno ?></td>
                                                <td><?= $datos->email ?></td>
                                                <td><?= $datos->clave_lada ?></td>
                                                <td><?= $datos->telefono ?></td>
                                                <td><?= $datos->fecha_registro ?></td>
                                                <td><?= $datos->contraseña ?></td>
                                                <td><?= $datos->nombre_usuario ?></td>
                                                <td><?= $datos->NIP ?></td>
                                                <td><?= $datos->cargo ?></td>
                                                <td><?= $datos->disponibilidad ?></td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>

            </div>
        </div>
    </div>
</div>
<script>
    document.getElementById('searchFormGuia').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('controlador/buscar_empleado.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        const tbody = document.querySelector('#Guias table tbody'); // Especifica el tbody correcto
        tbody.innerHTML = data;
    })
    .catch(error => console.error('Error:', error));
});
    </script>

