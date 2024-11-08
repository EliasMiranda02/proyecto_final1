<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excursiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">

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
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#añadirmodal"><i class="fa-solid fa-circle-plus"></i></a>
                <i>Nueva Excursion</i>
            </div>
            <br>
            <form id="searchFormExcursion" class="mb-3" method="POST" action="controlador/buscar_excursion.php">
                <input type="hidden" name="Excursion" value="Excursion"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="clasificacion">Clasificacion</option>
                        <option value="ubicacion">Ubicacion</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="Excursiones" action="controlador/eliminar_excursion.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center">Código</th>
                                <th scope="col" class="text-center">Destino</th>
                                <th scope="col" class="text-center">Clasificación</th>
                                <th scope="col" class="text-center">Descripción</th>
                                <th scope="col" class="text-center">Horas</th>
                                <th scope="col" class="text-center">Precio</th>
                                <th scope="col" class="text-center">Fecha de Creación</th>
                                <th scope="col" class="text-center">Fecha de Modificación</th>
                                <th scope="col" class="text-center">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM excursiones");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_excursion ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_excursion ?></th>
                                    <td class="text-center"><?= $datos->ubicacion ?></td>
                                    <td class="text-center"><?= $datos->clasificacion ?></td>
                                    <td class="text-center descripcion"><?= $datos->descripcion ?></td>
                                    <td class="text-center"><?= $datos->duracion_horas ?></td>
                                    <td class="text-center"><?= $datos->precio ?></td>
                                    <td class="text-center"><?= $datos->fecha_creacion ?></td>
                                    <td class="text-center"><?= $datos->fecha_modificacion ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen excursión" style="width: 100px; height: 60px;">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Excursion</button>
            </form>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Guias">Guias Turisticos</button>
            </div>
        </div>

    </div>

    <?php include "modal_excursion/modal_editar.php"; ?>
    <?php include "modal_excursion/modal_eliminar.php"; ?>
    <?php include "modal_excursion/modal_anadir.php"; ?>
    <?php include "modal_excursion/modal_guias.php"; ?>
    <script src="JS/t_excursiones.js"></script> <!--PENDIENTE -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>