<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos PV</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/hotel.css">
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/registro/Logo.png" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE PAGOS PV</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">
            <form id="searchFormPagoPV" class="mb-3" method="POST" action="controlador/buscar_pagopv.php">
                <input type="hidden" name="PagoPV" value="PagoPV"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_pagopv">Código</option>
                        <option value="id_reservapv">Código de Reserva PV</option>
                        <option value="id_tarjeta">Código de Tarjeta</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>

            <form id="Pagospv" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">id_pagopv</th>
                                <th scope="col" class="text-center encabezado">id_reservapv</th>
                                <th scope="col" class="text-center encabezado">id_tarjeta</th>
                                <th scope="col" class="text-center encabezado">fecha_pago</th>
                                <th scope="col" class="text-center encabezado">monto_total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM pagos_pv");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_pagopv ?>"></td>
                                    <th scope="row"><?= $datos->id_pagopv ?></th>
                                    <td><?= $datos->id_reservapv ?></td>
                                    <td><?= $datos->id_tarjeta ?></td>
                                    <td><?= $datos->fecha_pago ?></td>
                                    <td><?= $datos->monto_total ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_pagospv.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>