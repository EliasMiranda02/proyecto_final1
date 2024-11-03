<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas EA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">
            <form id="searchFormReservasea" class="mb-3" method="POST" action="controlador/buscar_reservaea.php">
                <input type="hidden" name="Reservaea" value="Reservaea"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_reservaea">ID</option>
                        <option value="cantidad_asientos">Cantidad de Asientos</option>
                        <option value="precio_excursion">Precio de la Excursion</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="Reservaea" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col"><input type="hidden" id="selectAll"></th>
                                <th scope="col">id_reservaea</th>
                                <th scope="col">id_cliente</th>
                                <th scope="col">id_recorrido</th>
                                <th scope="col">id_paquete</th>
                                <th scope="col">fecha_reserva</th>
                                <th scope="col">estado_reserva</th>
                                <th scope="col">lugar_salida</th>
                                <th scope="col">hora_salida</th>
                                <th scope="col">fecha_salida</th>
                                <th scope="col">cantidad_asientos</th>
                                <th scope="col">precio_excursion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM reservas_ea");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_reservaea ?>"></td>
                                    <th scope="row"><?= $datos->id_reservaea ?></th>
                                    <td><?= $datos->id_cliente ?></td>
                                    <td><?= $datos->id_recorrido ?></td>
                                    <td><?= $datos->id_paquete ?></td>
                                    <td><?= $datos->fecha_reserva ?></td>
                                    <td><?= $datos->estado_reserva ?></td>
                                    <td><?= $datos->lugar_salida ?></td>
                                    <td><?= $datos->hora_salida ?></td>
                                    <td><?= $datos->fecha_salida ?></td>
                                    <td><?= $datos->cantidad_asientos ?></td>
                                    <td><?= $datos->precio_excursion ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_reservaea.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>