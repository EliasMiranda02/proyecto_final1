<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-8 p-2">

            <!-- BUSACDOR DE LAS RECORRIDOS -->
            <form id="searchFormReservapv" class="mb-3" method="POST" action="controlador/buscar_reservapv.php">
                <input type="hidden" name="Reservapv" value="Reservapv"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="id_reservapv">Código</option>
                        <option value="fecha_reserva">Fecha de la Reserva</option>
                        <option value="estado_reserva">Estado de la Reserva</option>
                        <option value="lugar_salida">Lugar de Salida</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RECORRIDOS -->

            <form id="Reservapv" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center">id_reservapv</th>
                                <th scope="col" class="text-center">id_cliente</th>
                                <th scope="col" class="text-center">id_vuelo</th>
                                <th scope="col" class="text-center">id_paquete</th>
                                <th scope="col" class="text-center">fecha_reserva</th>
                                <th scope="col" class="text-center">estado_reserva</th>
                                <th scope="col" class="text-center">lugar_salida</th>
                                <th scope="col" class="text-center">hora_salida</th>
                                <th scope="col" class="text-center">fecha_salida</th>
                                <th scope="col" class="text-center">cantidad_asientos</th>
                                <th scope="col" class="text-center">precio_paquete</th>
                                <th scope="col" class="text-center">disponibilidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";
                            $sql = $conexion->query("SELECT * FROM reservas_pv");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_reservapv ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_reservapv ?></th>
                                    <th class="text-center"><?= $datos->id_cliente ?></th>
                                    <td class="text-center"><?= $datos->id_vuelo ?></td>
                                    <td class="text-center"><?= $datos->id_paquete ?></td>
                                    <td class="text-center"><?= $datos->fecha_reserva ?></td>
                                    <td class="text-center"><?= $datos->estado_reserva ?></td>
                                    <td class="text-center"><?= $datos->lugar_salida ?></td>
                                    <td class="text-center"><?= $datos->hora_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->cantidad_asientos ?></td>
                                    <td class="text-center"><?= $datos->precio_paquete ?></td>
                                    <td class="text-center"><?= $datos->disponibilidad ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>
    </div>

    <script src="JS/reservapv.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>