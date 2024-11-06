<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/empleado.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Empleado</title>
</head>

<body>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info" id="mensajeAlerta">
            <?php
            if ($_GET['mensaje'] == 'actualizado') {
                echo "Registro actualizado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error: " . ($_GET['detalle'] ?? '');
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se seleccionó ningún registro.";
            } elseif ($_GET['mensaje'] == 'eliminado') {
                echo "Registros eliminados correctamente.";
            } elseif ($_GET['mensaje'] == 'id_invalido') {
                echo "ID de registro inválido.";
            } elseif ($_GET['mensaje'] == 'registro_exitoso') {
                echo "Registro guardado correctamente.";
            }
            ?>
        </div>
    <?php endif; ?>
    <div class="container">

        <div class="left-side">
            <div class="btn-group-vertical" role="group">
                <button type="button" class="btn btn-primary" onclick="showTable('Administradores')">
                    ADMINISTRADORES
                </button>

                <button type="button" class="btn btn-primary" onclick="showTable('Asesores')">
                    ASESORES DE VIAJE
                </button>

                <button type="button" class="btn btn-primary" onclick="showTable('Guias')">
                    GUIAS TURISTICOS
                </button>
            </div>
        </div>
        <div class="right-side">
            <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar">Agregar Empleado</button>
            <div id="Administradores" class="table-container">
                <h5 class="modal-title">ADMINISTRADORES</h5>
                <form id="searchForm" method="POST" action="controlador/buscar_empleados.php">
                    <input type="hidden" name="cargo" value="Administrativo"> <!-- Campo oculto -->
                    <div class="input-group mb-3">
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
                <!-- TABLA DE USUARIOS -->

                <form id="deleteForm" action="controlador/eliminar_empleado.php" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="bg-info">
                                <tr>
                                    <th scope="col"><input type="hidden" id="selectAll"></th>
                                    <th scope="col" class="text-center">id_empleado</th>
                                    <th scope="col" class="text-center">nombre</th>
                                    <th scope="col" class="text-center">apellido paterno</th>
                                    <th scope="col" class="text-center">apellido materno</th>
                                    <th scope="col" class="px-3 text-center">email</th>
                                    <th scope="col" class="text-center">clave_lada</th>
                                    <th scope="col" class="text-center">telefono</th>
                                    <th scope="col" class="text-center">fecha_registro</th>
                                    <th scope="col" class="text-center">contraseña</th>
                                    <th scope="col" class="text-center">nombre_usuario</th>
                                    <th scope="col" class="text-center">NIP</th>
                                    <th scope="col" class="text-center">cargo</th>
                                    <th scope="col" class="text-center">disponibilidad</th>
                                    <th scope="col" class="text-center">Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Administrativo";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
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
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteForm">Eliminar seleccionados</button>
                        <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                    </div>
                </form>
            </div>
            <div id="Asesores" class="table-container">
                <h5 class="modal-title">ASESORES DE VIAJE</h5>
                <form id="searchFormAsesor" method="POST" action="controlador/buscar_empleados.php">
                    <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                    <div class="input-group mb-3">
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



                <!-- TABLA DE USUARIOS -->

                <form id="deleteFormAsesor" action="controlador/eliminar_empleado.php" method="post">
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
                                    <th scope="col">Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Asesor de Viajes";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
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
                                        <td>
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormAsesor">Eliminar seleccionados</button>
                        <button type="button" class="btn btn-warning" id="btnEditar2" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                    </div>
                </form>
            </div>
            <div id="Guias" class="table-container">
                <h5 class="modal-title">GUIAS TURISTICOS</h5>
                <form id="searchFormGuia" method="POST" action="controlador/buscar_empleados.php">
                    <input type="hidden" name="cargo" value="Guia Turistico"> <!-- Campo oculto -->
                    <div class="input-group mb-3">
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




                <!-- TABLA DE USUARIOS -->

                <form id="deleteFormGuia" action="controlador/eliminar_empleado.php" method="post">
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
                                    <th scope="col">Imagen</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Guia Turistico";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
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
                                        <td>
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>

                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormGuia">Eliminar seleccionados</button>
                        <button type="button" class="btn btn-warning" id="btnEditar3" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "modal_empleado/edit_empleado.php"; ?>
    <?php include "modal_empleado/administradores.php"; ?>
    <?php include "modal_empleado/add_empleado.php"; ?>
    <script src="JS/t_empleado.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>