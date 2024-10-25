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

            <!-- Modal ADMIN -->
            <div class="modal" id="Administradores" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ADMINISTRADORES</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- TABLA DE USUARIOS -->
                            <div class="col-12 p-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="Bg-info">
                                            <tr>
                                                <th scope="col">id_usuario</th>
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
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "modelo/conexion.php";
                                            $cargo = "Administrativo";
                                            $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                            while ($datos = $sql->fetch_object()) { ?>
                                                <tr>
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
                                                    <td>
                                                        <!-- Botón de edición con ícono y modal -->

                                                        <!-- Modal Bootstrap -->

                                                        <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $datos->id_empleado ?>">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>


                                                        <div class="modal fade" id="editModal<?= $datos->id_empleado ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $datos->id_empleado ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel<?= $datos->id_empleado ?>">Editar Usuario <?= $datos->id_empleado ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Nombre</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->nombre ?>">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Telefono</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->telefono ?>">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" id="email" value="<?= $datos->email ?>">
                                                                            </div>
                                                                            <!-- Agrega más campos según sea necesario -->
                                                                            <input type="submit" name="eliminar" value="Eliminar">
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
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
            <!-- Modal ASESOR-->
            <div class="modal" id="Asesor" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0px;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">ASESORES DE VIAJE</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- TABLA DE USUARIOS -->
                            <div class="col-12 p-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="Bg-info">
                                            <tr>
                                                <th scope="col">id_usuario</th>
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
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "modelo/conexion.php";
                                            $cargo = "Asesor de Viajes";
                                            $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                            while ($datos = $sql->fetch_object()) { ?>
                                                <tr>
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
                                                    <td>
                                                        <!-- Botón de edición con ícono y modal -->

                                                        <!-- Modal Bootstrap -->

                                                        <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $datos->id_empleado ?>">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>


                                                        <div class="modal fade" id="editModal<?= $datos->id_empleado ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $datos->id_empleado ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel<?= $datos->id_empleado ?>">Editar Usuario <?= $datos->id_empleado ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Nombre</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->nombre ?>">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Telefono</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->telefono ?>">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" id="email" value="<?= $datos->email ?>">
                                                                            </div>
                                                                            <!-- Agrega más campos según sea necesario -->
                                                                            <input type="submit" name="eliminar" value="Eliminar">
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
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
            <!-- Modal GUIA-->
            <div class="modal" id="Guias" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" style="margin-left: auto; margin-right: 0;">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">GUIAS TURISTICOS</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <!-- TABLA DE USUARIOS -->
                            <div class="col-12 p-2">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="Bg-info">
                                            <tr>
                                                <th scope="col">id_usuario</th>
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
                                                <th scope="col">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include "modelo/conexion.php";
                                            $cargo = "Guia Turistico";
                                            $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                            while ($datos = $sql->fetch_object()) { ?>
                                                <tr>
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
                                                    <td>
                                                        <!-- Botón de edición con ícono y modal -->

                                                        <!-- Modal Bootstrap -->

                                                        <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $datos->id_empleado ?>">
                                                            <i class="fa-solid fa-trash"></i>
                                                        </a>


                                                        <div class="modal fade" id="editModal<?= $datos->id_empleado ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $datos->id_empleado ?>" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h5 class="modal-title" id="editModalLabel<?= $datos->id_empleado ?>">Editar Usuario <?= $datos->id_empleado ?></h5>
                                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <form>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Nombre</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->nombre ?>">
                                                                            </div>
                                                                            <div class="mb-3">
                                                                                <label for="nombre" class="form-label">Telefono</label>
                                                                                <input type="text" class="form-control" id="nombre" value="<?= $datos->telefono ?>">
                                                                            </div>

                                                                            <div class="mb-3">
                                                                                <label for="email" class="form-label">Email</label>
                                                                                <input type="email" class="form-control" id="email" value="<?= $datos->email ?>">
                                                                            </div>
                                                                            <!-- Agrega más campos según sea necesario -->
                                                                            <input type="submit" name="eliminar" value="Eliminar">
                                                                        </form>

                                                                    </div>
                                                                    <div class="modal-footer">
                                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </td>
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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>