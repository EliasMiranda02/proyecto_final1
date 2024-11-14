<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Excursiones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/hotel.css">
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE EXCURSIONES</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class=" col-10">

            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info mb-3" id="mensajeAlerta">
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

            <div class="cabeza">
                <div class="add">
                <button href="#" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#añadirmodal">
                        <i class="fa-solid fa-plus"></i> Agregar Excursion
                    </button>
                </div>

                <div class="search">
                    <form id="searchFormExcursion" class="mb-3" method="POST" action="controlador/buscar_excursion.php">
                        <input type="hidden" name="Excursion" value="Excursion"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select" required>
                                <option value="clasificacion">Clasificacion</option>
                                <option value="ubicacion">Ubicacion</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="btn botones">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>




            <form id="Excursiones" action="controlador/eliminar_excursion.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Destino</th>
                                <th scope="col" class="text-center encabezado">Clasificación</th>
                                <th scope="col" class="text-center encabezado">Descripción</th>
                                <th scope="col" class="text-center encabezado">Horas</th>
                                <th scope="col" class="text-center encabezado">Precio</th>
                                <th scope="col" class="text-center encabezado">Fecha de Creación</th>
                                <th scope="col" class="text-center encabezado">Fecha de Modificación</th>
                                <th scope="col" class="text-center encabezado">Foto</th>
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
                                    <td class="text-center"><?= "$" . number_format($datos->precio,2)?></td>
                                    <td class="text-center"><?= $datos->fecha_creacion ?></td>
                                    <td class="text-center"><?= $datos->fecha_modificacion ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen Excursión" style="width: 100px; height: 60px;">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">
                        <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Excursion</button>
                        <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button type="button" class="btn botones agregar" data-bs-toggle="modal" data-bs-target="#Guias">Guias Turisticos</button>
                    </div>
                </div>

            </form>
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