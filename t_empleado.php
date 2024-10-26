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
    <div class="container-fluid d-flex justify-content-between p-3">
        <div class="btn-group" role="group" aria-label="Button group with nested dropdown">

            <div class="btn-group" role="group">
                <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    CARGOS
                </button>
                <ul class="dropdown-menu">
                    <li>
                        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#Administradores">
                            ADMINISTRADORES
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#Asesor">
                            ASESORES DE VIAJE
                        </button>
                    </li>
                    <li>
                        <button type="button" class="btn btn-primary mb-5" data-bs-toggle="modal" data-bs-target="#Guias">
                            GUIAS TURISTICOS
                        </button>
                    </li>
                </ul>
            </div>

            <button class="btn btn-success m-1">AGREGAR</button>

            <!-- Modal ADMIN -->
            <div class="modal" id="Administradores" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ADMINISTRADORES</h5>
                            <form id="searchForm" class="mb-3" method="POST" action="controlador/buscar_empleados.php">
                                <input type="hidden" name="cargo" value="Administrativo"> <!-- Campo oculto -->
                                <div class="input-group m-2 ">
                                    <select name="campo" class="form-select" required>
                                        <option value="nombre">Nombre</option>
                                        <option value="apellido_paterno">Apellido Paterno</option>
                                        <option value="apellido_materno">Apellido Materno</option>
                                        <option value="email">Email</option>
                                    </select>
                                    <input type="text" class="form-control" name="query" placeholder="Buscar..." required>
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                            </form>

                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- TABLA DE USUARIOS -->
                            <div class="col-12 p-3">
                                <form id="deleteForm" action="controlador/eliminar_empleado.php" method="post">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="Bg-info">
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
                                                    </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteForm">Eliminar seleccionados</button>
                                        <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Modal ASESOR-->
        <div class="modal" id="Asesor" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0px;">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">ASESORES DE VIAJE</h5>
                        <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_empleados.php">
                            <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                            <div class="input-group">
                                <select name="campo" class="form-select" required>
                                    <option value="nombre">Nombre</option>
                                    <option value="apellido_paterno">Apellido Paterno</option>
                                    <option value="apellido_materno">Apellido Materno</option>
                                    <option value="email">Email</option>
                                </select>
                                <input type="text" class="form-control" name="query" placeholder="Buscar..." required>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </div>
                        </form>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- TABLA DE USUARIOS -->
                        <div class="col-12 p-2">
                            <form id="deleteFormAsesor" action="controlador/eliminar_empleado.php" method="post">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="Bg-info">
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
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormAsesor">Eliminar seleccionados</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Modal GUIA-->
    <div class="modal" id="Guias" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">GUIAS TURISTICOS</h5>
                    <form id="searchFormGuia" class="mb-3" method="POST" action="controlador/buscar_empleados.php">
                        <input type="hidden" name="cargo" value="Guia Turistico"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select" required>
                                <option value="nombre">Nombre</option>
                                <option value="apellido_paterno">Apellido Paterno</option>
                                <option value="apellido_materno">Apellido Materno</option>
                                <option value="email">Email</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar..." required>
                            <button type="submit" class="btn btn-primary">Buscar</button>
                        </div>
                    </form>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <!-- TABLA DE USUARIOS -->
                        <div class="col-8">
                            <form id="deleteFormGuia" action="controlador/eliminar_empleado.php" method="post">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="Bg-info">
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
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormGuia">Eliminar seleccionados</button>
                                </div>
                            </form>
                        </div>
                        <!-- Nueva tabla (Derecha) -->
                        <div class="col-4">
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="Bg-info">
                                        <tr>
                                            <th scope="col">disponibilidad</th>
                                            <th> </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        include "modelo/conexion.php";
                                        $sql = $conexion->query("select * from guias_turisticos");
                                        while ($datos = $sql->fetch_object()) { ?>
                                            <tr>
                                                <th scope="row"><?= $datos->nombre ?></th>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    </div>
    </div>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info" id="mensajeAlerta">
            <?php
            if ($_GET['mensaje'] == 'actualizado') {
                echo "Usuario actualizado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error: " . ($_GET['detalle'] ?? '');
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se seleccionó ningún usuario para editar.";
            } elseif ($_GET['mensaje'] == 'eliminado') {
                echo "Usuarios eliminados correctamente.";
            } elseif ($_GET['mensaje'] == 'id_invalido') {
                echo "ID de usuario inválido.";
            }
            ?>
        </div>
    <?php endif; ?>

    <?php include "modal_empleado/edit_empleado.php"; ?>
    <?php include "modal_empleado/administradores.php"; ?>
    <script src="JS/t_empleado.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>