<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos V</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/hotel.css">
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/registro/Logo.png" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE PAGOS DE VUELO</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        
        <div class=" col-10">
            <form id="searchFormPagov" class="mb-3" method="POST" action="controlador/buscar_pagov.php">
                <input type="hidden" name="Pagov" value="Pagov"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_pagov">Código</option>
                        <option value="id_reservav">Código de Reserva PV</option>
                        <option value="id_tarjeta">Código de Tarjeta</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>

            <form id="Pagosv" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Código de Reserva V</th>
                                <th scope="col" class="text-center encabezado">Código de Tarjeta</th>
                                <th scope="col" class="text-center encabezado">Pago</th>
                                <th scope="col" class="text-center encabezado">Fecha del Pago</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM pagos_v");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_pagov ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_pagov ?></th>
                                    <td class="text-center"><?= $datos->id_reservav ?></td>
                                    <td class="text-center"><?= $datos->id_tarjeta ?></td>
                                    <td class="text-center"><?= $datos->pago ?></td>
                                    <td class="text-center"><?= $datos->fecha_pago ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_pagosv.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>