<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Precio de Paquetes</title>
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
            <br>
            <form id="searchFormpp" class="mb-3" method="POST" action="controlador/buscar_pp.php">
                <input type="hidden" name="Paqueteprecio" value="Paqueteprecio"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="nombre">Nombre del Paquete</option>
                        <option value="precio_total">Precio</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="pp" action="controlador/eliminar_pp.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col"><input type="hidden" id="selectAll"></th>
                                <th scope="col">Numero del Paquete</th>
                                <th scope="col">Nombre del Paquete</th>
                                <th scope="col">Destino</th>
                                <th scope="col">Precio</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT p.numero_paquete, p.nombre AS nombre_paquete, p.destino, pp.precio_total, pp.id_precio
                            FROM paquetes p
                            JOIN paquetes_precios pp ON p.id_paquete = pp.id_paquete");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_precio ?>"></td>
                                    <th scope="row"><?= $datos->numero_paquete ?></th>
                                    <td><?= $datos->nombre_paquete ?></td>
                                    <td><?= $datos->destino ?></td>
                                    <td><?= $datos->precio_total ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
            </form>
            <br>
            <div class="fixed-buttons text-right">
                <button type="button" class="btn btn-primary" onclick="window.location.href='form_paquete_intinerario.php'">Agregar itinerario</button>
            </div>
        </div>

    </div>


    <?php include "modal_pp/eliminar.php"; ?>
    <script src="JS/t_paquete_precio.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>