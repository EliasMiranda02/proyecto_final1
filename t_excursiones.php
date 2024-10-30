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
                <div class="col-auto">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#añadirmodal"><i class="fa-solid fa-circle-plus"></i></a>
                    <i>Nueva Excursion</i>
                </div>
            </div>
        <div class=" col-8 p-2">
            
            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info" id="mensajeAlerta">
                    <?php
                    if ($_GET['mensaje'] == 'actualizado') {
                        echo "Hotel actualizado correctamente.";
                    } elseif ($_GET['mensaje'] == 'error') {
                        echo "Hubo un error: " . ($_GET['detalle'] ?? '');
                    } elseif ($_GET['mensaje'] == 'no_id') {
                        echo "No se seleccionó ningún hotel para editar.";
                    } elseif ($_GET['mensaje'] == 'eliminado') {
                        echo "Hoteles eliminados correctamente.";
                    } elseif ($_GET['mensaje'] == 'id_invalido') {
                        echo "ID de Hotel inválido.";
                    }
                    ?>
                </div>
            <?php endif; ?>
            
            <form id="searchFormExcursion" class="mb-3" method="POST" action="controlador/buscar_excursion.php">
                <input type="hidden" name="Excursion" value="Excursion"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="nombre">Nombre de la Excursion</option>
                        <option value="clasificacion">Clasificacion</option>
                        <option value="cantidad_maxima">Cantidad Maxima de Personas</option>
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
                            <th scope="col">id_excursion</th>
                            <th scope="col">nombre de la excursion</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio_aproximado</th>
                            <th scope="col">duracion_horas</th>
                            <th scope="col">ubicacion</th>
                            <th scope="col">clasificacion</th>
                            <th scope="col">cantidad_maxima</th>
                            <th scope="col">porcentaje_descuento</th>
                            <th scope="col">precio_porcentaje</th>
                            <th scope="col">fecha_creacion</th>
                            <th scope="col">fecha_modificacion</th>
                            <th scope="col">disponibilidad</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";

                        $sql = $conexion->query("SELECT * FROM excursiones");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_excursion ?>"></td>
                                <th scope="row"><?= $datos->id_excursion ?></th>
                                <td><?= $datos->nombre ?></td>
                                <td><?= $datos->descripcion ?></td>
                                <td><?= $datos->precio_aproximado ?></td>
                                <td><?= $datos->duracion_horas ?></td>
                                <td><?= $datos->ubicacion ?></td>
                                <td><?= $datos->clasificacion ?></td>
                                <td><?= $datos->cantidad_maxima ?></td>
                                <td><?= $datos->porcentaje_descuento ?></td>
                                <td><?= $datos->precio_porcentaje ?></td>
                                <td><?= $datos->fecha_creacion ?></td>
                                <td><?= $datos->fecha_modificacion ?></td>
                                <td><?= $datos->disponibilidad ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Excursion</button>
            </form>
        </div>

    </div>

    <?php include "modal_excursion/modal_editar.php"; ?>
    <?php include "modal_excursion/modal_eliminar.php"; ?>
    <?php include "modal_excursion/modal_anadir.php";?>
    <script src="JS/t_excursiones.js"></script> <!--PENDIENTE -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>