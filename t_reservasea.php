<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservas EA</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/hotel.css">
    <!-- LINKS DE MARCELA -->
    <link rel="stylesheet" href="vista/CSS/acceso.css" />
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />1
</head>

<body>

    <!-- SIDEBAR -->

    <nav>
        <div class="logo">
            <i class="bx bx-menu menu-icon"></i>
            <span class="tittle"><b>Chiapas Viajero</b> | Panel de Administración</span>
        </div>

        <div class="sidebar">
            <div class="logo">
                <i class='bx bx-menu icon-menu'></i>
                <span class="logo-name"><b>Chiapas Viajero</b></span>
            </div>

            <div class="sidebar-content">
                <ul class="lists">
                    <li class="list">
                        <div class="nav-link">
                            <i class='bx bxs-user icon'></i>
                            <span class="link">Usuarios</span>
                            <i class='bx bxs-chevron-down arrow'></i>
                        </div>

                        <ul class="sub-menu">
                            <li><a href="t_usuario.php">Viajeros</a></li>
                            <li><a href="index.php?i=empleado">Equipo de Trabajo</a></li> <!--EJEMPLO DE CAMBIO QUE HARE-->
                        </ul>
                    </li>

                    <li class="list">
                        <div class="nav-link">
                            <i class='bx bxs-store icon'></i>
                            <span class="link">Servicios</span>
                            <i class='bx bxs-chevron-down arrow'></i>
                        </div>

                        <ul class="sub-menu">
                            <li><a href="t_paquetes.php">Paquetes Turísticos</a></li>
                            <li><a href="t_excursiones.php">Excursiones</a></li>
                            <li><a href="t_hoteles.php">Hospedaje</a></li>
                        </ul>
                    </li>

                    <li class="list">
                        <a href="t_volante.php" class="nav-link">
                            <i class='bx bxs-plane-alt icon'></i>
                            <span class="link">Chiapas Volante</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="renta_carros.php" class="nav-link">
                            <i class='bx bxs-bus icon'></i>
                            <span class="link">Chiapas Rodante</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="t_catacarros.php" class="nav-link">
                            <i class='bx bxs-car icon'></i>
                            <span class="link">Catalogo de Carros</span>
                        </a>
                    </li>

                    <li class="list">
                        <div class="nav-link">
                            <i class='bx bxs-book-content icon'></i>
                            <span class="link">Reservas</span>
                            <i class='bx bxs-chevron-down arrow'></i>
                        </div>

                        <ul class="sub-menu">
                            <li><a href="t_reservaspa.php">Paquetes Turísticos</a></li>
                            <li><a href="t_reservasea.php">Excursiones</a></li>
                            <li><a href="t_reservasv.php">Reservas de Vuelos</a></li>
                            <li><a href="t_reservaspv.php">Renta de Vehículos</a></li>
                        </ul>
                    </li>

                    <li class="list">
                        <a href="calificaciones.php" class="nav-link">
                            <i class='bx bxs-chat icon'></i>
                            <span class="link">Calificaciones</span>
                        </a>
                    </li>
                </ul>

                <div class="botton-content">
                    <li class="list">
                        <a href="home.php" class="nav-linki">
                            <i class='bx bx-log-out iconi'></i>
                            <span class="linki">Regresar</span>
                        </a>
                    </li>
                </div>
            </div>
        </div>
    </nav>

    <!-- FIN DEL SIDEBAR -->

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE RESERVAS EA</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class=" col-10">
            <div class="cabeza">
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
                        <button type="submit" class="botone">Buscar</button>
                    </div>
                </form>
            </div>

            <form id="Reservaea" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Código del Cliente</th>
                                <th scope="col" class="text-center encabezado">Código del Recorrido</th>
                                <th scope="col" class="text-center encabezado">Código del Paquete</th>
                                <th scope="col" class="text-center encabezado">Fecha de Reserva</th>
                                <th scope="col" class="text-center encabezado">Estado de Reserva</th>
                                <th scope="col" class="text-center encabezado">Lugar de Salida</th>
                                <th scope="col" class="text-center encabezado">Hora de Salida</th>
                                <th scope="col" class="text-center encabezado">Fecha de Salida</th>
                                <th scope="col" class="text-center encabezado">Cantidad de Asientos</th>
                                <th scope="col" class="text-center encabezado">Precio de Excursión</th>
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
            <div class="boton d-flex justify-content-between mb-1">
                <div class="d-flex">
                    <!-- <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Disponibilidad</button>
                    <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button> -->
                </div>
                <div class="fixed-buttons">
                    <button type="button" class="btn botones agregar" onclick="window.location.href='pagosea.php'">Pagos</button>
                </div>
            </div>
        </div>

    </div>

    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script src="JS/t_reservaea.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>