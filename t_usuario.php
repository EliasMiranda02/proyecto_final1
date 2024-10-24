<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                $sql = $conexion->query("SELECT* FROM clientes");
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
                            <!-- Botón de edición con ícono y modal -->
            
                            <!-- Modal Bootstrap -->
                
                            <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#editModal<?= $datos->id_cliente ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>


                            <div class="modal fade" id="editModal<?= $datos->id_cliente ?>" tabindex="-1" aria-labelledby="editModalLabel<?= $datos->id_cliente ?>" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editModalLabel<?= $datos->id_cliente ?>">Editar Usuario <?= $datos->id_cliente ?></h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form method="post">
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombre</label>
                                                    <input type="text" class="form-control" id="nombre" value="<?= $datos->nombre ?>" disabled>
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Telefono</label>
                                                    <input type="text" class="form-control" id="nombre" value="<?= $datos->telefono?>" disabled>
                                                </div>

                                                <div class="mb-3">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" class="form-control" id="email" value="<?= $datos->email ?>" disabled>
                                                </div>

                                                <input type="submit" name="eliminar" value="Regístrate ahora">
                                                <!-- Agrega más campos según sea necesario -->
                                                
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>
