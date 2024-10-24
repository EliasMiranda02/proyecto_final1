<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- TABLA DE USUARIOS -->
    <div class="col-12 p-2">
        <table class="table">
            <thead class="Bg-info">
                <tr>
                    <th scope="col">id_usuario</th>
                    <th scope="col">nombre</th>
                    <th scope="col">apellido materno</th>
                    <th scope="col">apellido paterno</th>
                    <th scope="col" class="px-3 text-center">email</th>
                    <th scope="col" class="text-center">clave_lada</th>
                    <th scope="col">telefono</th>
                    <th scope="col">fecha_registro</th>
                    <th scope="col">contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "modelo/conexion.php";

                $sql = $conexion->query("SELECT * FROM clientes");
                if ($sql->num_rows > 0) {
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?= $datos->id_cliente ?></th>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido_materno ?></td>
                            <td><?= $datos->apellido_paterno ?></td>
                            <td><?= $datos->email ?></td>
                            <td><?= $datos->clave_lada ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td><?= $datos->fecha_registro ?></td>
                            <td><?= $datos->contraseña ?></td>
                            <td>
                                <!-- Botón de eliminación que abre el modal -->
                                <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $datos->id_cliente ?>">
                                    <i class="fa-solid fa-trash"></i>
                                </a>

                                <!-- Modal de Confirmación -->
                                <div class="modal fade" id="deleteModal<?= $datos->id_cliente ?>" tabindex="-1" aria-labelledby="deleteModalLabel<?= $datos->id_cliente ?>" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="deleteModalLabel<?= $datos->id_cliente ?>">Confirmar Eliminación</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p>¿Está seguro de que desea eliminar al usuario <strong><?= $datos->nombre ?></strong>?</p>
                                                <p>Teléfono: <?= $datos->telefono ?></p>
                                                <p>Email: <?= $datos->email ?></p>
                                            </div>
                                            <div class="modal-footer">
                                                <form method="post" action="controlador/eliminar_usuario.php"> <!-- Cambié la acción -->
                                                    <input type="hidden" name="eliminar" value="<?= $datos->id_cliente ?>"> <!-- ID correcto -->
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php }
                } else {
                    echo "<tr><td colspan='10' class='text-center'>No se encontraron usuarios.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
