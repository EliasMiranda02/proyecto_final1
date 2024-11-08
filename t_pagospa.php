<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos PA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">
            <form id="searchFormPagospa" class="mb-3" method="POST" action="controlador/buscar_pagospa.php">
                <input type="hidden" name="Pagospa" value="Pagospa"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_pagopa">Código</option>
                        <option value="id_reservapa">Código de Reserva PA</option>
                        <option value="id_tarjeta">Código de Tarjeta</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="Pagospa" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="text-center"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center">id_pagopa</th>
                                <th scope="col" class="text-center">id_reservapa</th>
                                <th scope="col" class="text-center">id_tarjeta</th>
                                <th scope="col" class="text-center">fecha_pago</th>
                                <th scope="col" class="text-center">monto_total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM pagos_pa");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_pagopa ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_pagopa ?></th>
                                    <td class="text-center"><?= $datos->id_reservapa ?></td>
                                    <td class="text-center"><?= $datos->id_tarjeta ?></td>
                                    <td class="text-center"><?= $datos->fecha_pago ?></td>
                                    <td class="text-center"><?= $datos->monto_total ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_pagospa.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>