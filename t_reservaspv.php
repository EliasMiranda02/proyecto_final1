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

<div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE RESERVAS PV</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">
        <div class="cabeza">
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
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>
        </div>

            <!-- TABLA DE RECORRIDOS -->

            <form id="Reservapv" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                
                                <th scope="col" class="text-center encabezado">Código del Vuelo</th>
                                <th scope="col" class="text-center encabezado">Código del Paquete</th>
                                <th scope="col" class="text-center encabezado">Fecha de Reserva</th>
                                <th scope="col" class="text-center encabezado">Disponibilidad</th>
                                <th scope="col" class="text-center encabezado">Lugar de Salida</th>
                                <th scope="col" class="text-center encabezado">Hora de Salida</th>
                                <th scope="col" class="text-center encabezado">Fecha de Salida</th>
                                <th scope="col" class="text-center encabezado">Cantidad de Asientos</th>
                                <th scope="col" class="text-center encabezado">Precio de Paquete</th>
                                
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
                                    
                                    <td class="text-center"><?= $datos->id_vuelo ?></td>
                                    <td class="text-center"><?= $datos->id_paquete ?></td>
                                    <td class="text-center"><?= $datos->fecha_reserva ?></td>
                                    <td class="text-center"><?= $datos->estado_reserva ?></td>
                                    <td class="text-center"><?= $datos->lugar_salida ?></td>
                                    <td class="text-center"><?= $datos->hora_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->cantidad_asientos ?></td>
                                    <td class="text-center"><?= $datos->precio_paquete ?></td>
                                    
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