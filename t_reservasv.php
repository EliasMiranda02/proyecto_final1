<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas V</title>
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
            <h4>REGISTRO DE RESERVAS DE VUELO</h4>
        </div>

    </div>
    <div class="d-flex justify-content-center align-items-center">
        
        <div class=" col-10">
        <div class="cabeza">
            <form id="searchFormReservasv" class="mb-3" method="POST" action="controlador/buscar_reservav.php">
                <input type="hidden" name="Reservav" value="Reservav"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_reservav">Código</option>
                        <option value="estado">Estado</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>
        </div>

            <form id="Reservav" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Código del Cliente</th>
                                <th scope="col" class="text-center encabezado">Código del Vuelo</th>
                                <th scope="col" class="text-center encabezado">Fecha de Reserva</th>
                                <th scope="col" class="text-center encabezado">Hora de Reserva</th>
                                <th scope="col" class="text-center encabezado">Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM reservas_v");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_reservav ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_reservav ?></th>
                                    <td class="text-center"><?= $datos->id_cliente ?></td>
                                    <td class="text-center"><?= $datos->id_vuelo ?></td>
                                    <td class="text-center"><?= $datos->fecha_reserva ?></td>
                                    <td class="text-center"><?= $datos->hora_reserva ?></td>
                                    <td class="text-center"><?= $datos->estado ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_reservav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>