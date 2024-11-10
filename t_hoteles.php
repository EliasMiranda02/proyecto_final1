<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Hoteles</title>
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
            <h4>REGISTRO DE HOTELES</h4>
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
                        echo "No se seleccionó ningún registro para editar.";
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
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#añadirmodal">
                        <i class="fa-solid fa-plus"></i> Agregar Hotel
                    </button>
                </div>

                <div class="search">
                    <form id="searchFormHotel" class="mb-3" method="POST" action="controlador/buscar_hotel.php">
                        <input type="hidden" name="Hotel" value="Hotel"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select" required>
                                <option value="nombre_hotel">Nombre del Hotel</option>
                                <option value="correo_electronico">Correo Electronico</option>

                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="btn botones">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>




            <form id="Hoteles" action="controlador/eliminar_hotel.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Nombre del Hotel</th>
                                <th scope="col" class="text-center encabezado">Dirección</th>
                                <th scope="col" class="text-center encabezado">Clave Lada</th>
                                <th scope="col" class="text-center encabezado">Teléfono</th>
                                <th scope="col" class="text-center encabezado">Correo Eléctronico</th>
                                <th scope="col" class="text-center encabezado">Numero de Habitaciones</th>
                                <th scope="col" class="text-center encabezado">Descripción</th>
                                <th scope="col" class="text-center encabezado">Precio por noche</th>
                                <th scope="col" class="text-center encabezado">Calificación</th>
                                <th scope="col" class="text-center encabezado">Foto</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM hoteles");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_hotel ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_hotel ?></th>
                                    <td class="text-center"><?= $datos->nombre_hotel ?></td>
                                    <td class="descripcion text-center"><?= $datos->direccion ?></td>
                                    <td class="text-center"><?= $datos->clave_lada ?></td>
                                    <td class="text-center"><?= $datos->telefono ?></td>
                                    <td class="text-center"><?= $datos->correo_electronico ?></td>
                                    <td class="text-center"><?= $datos->numero_habitaciones ?></td>
                                    <td class="descripcion text-center"><?= $datos->descripcion ?></td>
                                    <td class="text-center">$<?= $datos->precio_noche ?></td>
                                    <td class="text-center"><?= $datos->calificacion ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen del hotel" style="width: 100px; height: 60px;">
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">
                        <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Hotel</button>
                        <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                    </div>
                </div>
            </form>
        </div>

    </div>

    <?php include "modal_hotel/modal_editar.php"; ?>
    <?php include "modal_hotel/modal_eliminar.php"; ?>
    <?php include "modal_hotel/modal_añadir.php"; ?>
    <script src="JS/t_hotel.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>