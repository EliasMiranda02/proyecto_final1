<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagos EA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>
<div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE PAGOS EA</h4>
        </div>

    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class=" col-10">
        <div class="cabeza">
            <form id="searchFormPagosea" class="mb-3" method="POST" action="controlador/buscar_pagosea.php">
                <input type="hidden" name="Pagosea" value="Pagosea"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_pagoea">Código</option>
                        <option value="id_reservaea">Código de Reserva EA</option>
                        <option value="id_tarjeta">Código de Tarjeta</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>
        </div>

            <form id="Pagosea" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Código de Reserva EA</th>
                                <th scope="col" class="text-center encabezado">Código de Tarjeta</th>
                                <th scope="col" class="text-center encabezado">Fecha del Pago</th>
                                <th scope="col" class="text-center encabezado">Monto Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM pagos_ea");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_pagoea ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_pagoea ?></th>
                                    <td class="text-center"><?= $datos->id_reservaea ?></td>
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


    <script src="JS/pagosea.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>