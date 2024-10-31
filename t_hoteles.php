<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Hoteles</title>
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
            <div class="col-auto">
                    <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#añadirmodal"><i class="fa-solid fa-circle-plus"></i></a>
                    <i>Nuevo Hotel</i>
                </div>
                <br>
            <form id="searchFormHotel" class="mb-3" method="POST" action="controlador/buscar_hotel.php">
                <input type="hidden" name="Hotel" value="Hotel"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="nombre_hotel">Nombre del Hotel</option>
                        <option value="numero_habitaciones">Numero de Habitaciones</option>
                        <option value="calificacion">Calificacion</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="Hoteles" action="controlador/eliminar_hotel.php" method="post">
            <div class="table-responsive">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col"><input type="hidden" id="selectAll"></th>
                            <th scope="col">id_hotel</th>
                            <th scope="col">nombre del hotel</th>
                            <th scope="col">direccion</th>
                            <th scope="col">clave lada</th>
                            <th scope="col">telefono</th>
                            <th scope="col">correo electronico</th>
                            <th scope="col">numero habitaciones</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio por noche</th>
                            <th scope="col">calificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";

                        $sql = $conexion->query("SELECT * FROM hoteles");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_hotel ?>"></td>
                                <th scope="row"><?= $datos->id_hotel ?></th>
                                <td><?= $datos->nombre_hotel ?></td>
                                <td><?= $datos->direccion ?></td>
                                <td><?= $datos->clave_lada ?></td>
                                <td><?= $datos->telefono ?></td>
                                <td><?= $datos->correo_electronico ?></td>
                                <td><?= $datos->numero_habitaciones ?></td>
                                <td><?= $datos->descripcion ?></td>
                                <td><?= $datos->precio_noche ?></td>
                                <td><?= $datos->calificacion ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Hotel</button>
            </form>
        </div>

    </div>

    <?php include "modal_hotel/modal_editar.php"; ?>
    <?php include "modal_hotel/modal_eliminar.php"; ?>
    <?php include "modal_hotel/modal_añadir.php";?>
    <script src="JS/t_hotel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>