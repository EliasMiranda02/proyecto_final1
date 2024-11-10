
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
                    <div class=" col-10">

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
                                <button type="submit" class="btn botones">Buscar</button>
                            </div>
                        </form>
                        
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-info">
                                        <tr>
                                            <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                            <th scope="col" class="text-center encabezado">Código del Empleado</th>
                                            <th scope="col" class="text-center encabezado">Nombre</th>
                                            <th scope="col" class="text-center encabezado">Apellido Paterno</th>
                                            <th scope="col" class="text-center encabezado">Apellido Materno</th>
                                            <th scope="col" class="px-3 text-center encabezado">Email</th>
                                            <th scope="col" class="text-center encabezado">Clave_lada</th>
                                            <th scope="col" class="text-center encabezado">Telefono</th>
                                            <th scope="col" class="text-center encabezado">Fecha de Registro</th>
                                            <th scope="col" class="text-center encabezado">Contraseña</th>
                                            <th scope="col" class="text-center encabezado">Nombre de Usuario</th>
                                            <th scope="col" class="text-center encabezado">NIP</th>
                                            <th scope="col" class="text-center encabezado">Cargo</th>
                                            <th scope="col" class="text-center encabezado">Disponibilidad</th>
                                            <th scope="col" class="text-center encabezado">Foto</th>
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
                                                <th scope="row" class="text-center"><?= $datos->id_empleado ?></th>
                                                <td class="text-center"><?= $datos->nombre ?></td>
                                                <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                                <td class="text-center"><?= $datos->apellido_materno ?></td>
                                                <td class="text-center"><?= $datos->email ?></td>
                                                <td class="text-center"><?= $datos->clave_lada ?></td>
                                                <td class="text-center"><?= $datos->telefono ?></td>
                                                <td class="text-center"><?= $datos->fecha_registro ?></td>
                                                <td class="text-center"><?= $datos->contraseña ?></td>
                                                <td class="text-center"><?= $datos->nombre_usuario ?></td>
                                                <td class="text-center"><?= $datos->NIP ?></td>
                                                <td class="text-center"><?= $datos->cargo ?></td>
                                                <td class="text-center"><?= $datos->disponibilidad ?></td>
                                                <td class="text-center">
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
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

