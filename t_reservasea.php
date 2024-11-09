<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas EA</title>
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
            <h4>REGISTRO DE RESERVAS EA</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">
            <form id="searchFormReservasea" class="mb-3" method="POST" action="controlador/buscar_reservaea.php">
                <input type="hidden" name="Reservaea" value="Reservaea"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_reservaea">Código</option>
                        <option value="fecha_reserva">Fecha de la Reserva</option>
                        <option value="estado_reserva">Estado de la Reserva</option>
                        <option value="lugar_salida">Lugar de Salida</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>

            <form id="Reservaea" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">id_reservaea</th>
                                <th scope="col" class="text-center encabezado">id_cliente</th>
                                <th scope="col" class="text-center encabezado">id_recorrido</th>
                                <th scope="col" class="text-center encabezado">id_paquete</th>
                                <th scope="col" class="text-center encabezado">fecha_reserva</th>
                                <th scope="col" class="text-center encabezado">estado_reserva</th>
                                <th scope="col" class="text-center encabezado">lugar_salida</th>
                                <th scope="col" class="text-center encabezado">hora_salida</th>
                                <th scope="col" class="text-center encabezado">fecha_salida</th>
                                <th scope="col" class="text-center encabezado">cantidad_asientos</th>
                                <th scope="col" class="text-center encabezado">precio_excursion</th>
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
                                    <td class="text-center"><?= $datos->id_cliente ?></td>
                                    <td class="text-center"><?= $datos->id_recorrido ?></td>
                                    <td class="text-center"><?= $datos->id_paquete ?></td>
                                    <td class="text-center"><?= $datos->fecha_reserva ?></td>
                                    <td class="text-center"><?= $datos->estado_reserva ?></td>
                                    <td class="text-center"><?= $datos->lugar_salida ?></td>
                                    <td class="text-center"><?= $datos->hora_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->cantidad_asientos ?></td>
                                    <td class="text-center"><?= $datos->precio_excursion ?></td>
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