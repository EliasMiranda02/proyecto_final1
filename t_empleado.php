<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/empleado.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Empleado</title>
    <!-- LINKS DE MARCELA -->
    <link rel="stylesheet" href="vista/CSS/acceso.css" />
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

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
                        <a href="#" class="nav-link">
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
                            <li><a href="#">Paquetes Turísticos</a></li>
                            <li><a href="#">Excursiones</a></li>
                            <li><a href="#">Alojamiento</a></li>
                            <li><a href="#">Reservas de Vuelos</a></li>
                            <li><a href="#">Renta de Vehículos</a></li>
                        </ul>
                    </li>

                    <li class="list">
                        <a href="#" class="nav-link">
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
            <h4>REGISTRO DE EMPLEADOS</h4>
        </div>

    </div>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info mb-3" id="mensajeAlerta">
            <?php
            if ($_GET['mensaje'] == 'actualizado') {
                echo "Registro actualizado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error: " . ($_GET['detalle'] ?? '');
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se seleccionó ningún registro.";
            } elseif ($_GET['mensaje'] == 'eliminado') {
                echo "Registros eliminados correctamente.";
            } elseif ($_GET['mensaje'] == 'id_invalido') {
                echo "ID de registro inválido.";
            } elseif ($_GET['mensaje'] == 'registro_exitoso') {
                echo "Registro guardado correctamente.";
            }
            ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <div class="left-side">
            <div class="btn-group-vertical" role="group">
                <button type="button" class="btn botones" onclick="showTable('Administradores')">
                    ADMINISTRADORES
                </button>

                <button type="button" class="btn botones" onclick="showTable('Asesores')">
                    ASESORES DE VIAJE
                </button>

                <button type="button" class="btn botones" onclick="showTable('Guias')">
                    GUIAS TURISTICOS
                </button>
            </div>
        </div>
        <div class="right-side">

            <div id="Administradores" class="table-container">
                <h5 class="modal-title">ADMINISTRADORES</h5>
                <br>
                <div class="cabeza">
                    <div class="add">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                            <i class="fa-solid fa-plus"></i> Agregar Empleado
                        </button>
                    </div>
                    <form id="searchForm" method="POST" action="controlador/buscar_empleados.php">
                        <input type="hidden" name="cargo" value="Administrativo"> <!-- Campo oculto -->
                        <div class="input-group mb-3">
                            <select name="campo" class="form-select" required>
                                <option value="nombre">Nombre</option>
                                <option value="apellido_paterno">Apellido Paterno</option>
                                <option value="apellido_materno">Apellido Materno</option>
                                <option value="email">Email</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="botone">Buscar</button>
                        </div>
                    </form>
                </div>
                <!-- TABLA DE USUARIOS -->

                <form id="deleteForm" action="controlador/eliminar_empleado.php" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                    <th scope="col" class="text-center encabezado">Código</th>
                                    <th scope="col" class="text-center encabezado">Nombre</th>
                                    <th scope="col" class="text-center encabezado">Apellido Paterno</th>
                                    <th scope="col" class="text-center encabezado">Apellido Materno</th>
                                    <th scope="col" class="px-3 text-center encabezado">Email</th>
                                    <th scope="col" class="text-center encabezado">Clave Lada</th>
                                    <th scope="col" class="text-center encabezado">Teléfono</th>
                                    <th scope="col" class="text-center encabezado">Fecha de Registro</th>
                                    <th scope="col" class="text-center encabezado">Contraseña</th>
                                    <th scope="col" class="text-center encabezado">Nombre de Usuario</th>
                                    <th scope="col" class="text-center encabezado">NIP</th>
                                    <th scope="col" class="text-center encabezado">Cargo</th>
                                    <th scope="col" class="text-center encabezado">Disponibilidad</th>
                                    <th scope="col" class="text-center encabezado">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Administrativo";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
                                        <th scope="row" class="text-center"><?= $datos->id_empleado ?></th>
                                        <td class="text-center"><?= $datos->nombre ?></td>
                                        <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                        <td class="text-center"><?= $datos->apellido_materno ?></td>
                                        <td class="text-center"><?= $datos->email ?></td>
                                        <td class="text-center"><?= $datos->clave_lada ?></td>
                                        <td class="text-center"><?= $datos->telefono ?></td>
                                        <td class="text-center"><?= $datos->fecha_registro ?></td>
                                        <td class="text-center"><?= $datos->contraseña ?></td>
                                        <td class="text-center"><?= $datos->nombre_usuario ?></td>
                                        <td class="text-center"><?= $datos->NIP ?></td>
                                        <td class="text-center"><?= $datos->cargo ?></td>
                                        <td class="text-center"><?= $datos->disponibilidad ?></td>
                                        <td class="text-center">
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="boton d-flex justify-content-between mb-1">
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                            <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteForm">Eliminar seleccionados</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="Asesores" class="table-container">
                <h5 class="modal-title">ASESORES DE VIAJE</h5>
                <br>
                <div class="cabeza">
                    <div class="add">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                            <i class="fa-solid fa-plus"></i> Agregar Empleado
                        </button>
                    </div>
                    <form id="searchFormAsesor" method="POST" action="controlador/buscar_empleado.php">
                        <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                        <div class="input-group mb-3">
                            <select name="campo" class="form-select" required>
                                <option value="nombre">Nombre</option>
                                <option value="apellido_paterno">Apellido Paterno</option>
                                <option value="apellido_materno">Apellido Materno</option>
                                <option value="email">Email</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="botone">Buscar</button>
                        </div>
                    </form>
                </div>



                <!-- TABLA DE USUARIOS -->

                <form id="deleteFormAsesor" action="controlador/eliminar_empleado.php" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                    <th scope="col" class="text-center encabezado">Código</th>
                                    <th scope="col" class="text-center encabezado">Nombre</th>
                                    <th scope="col" class="text-center encabezado">Apellido Paterno</th>
                                    <th scope="col" class="text-center encabezado">Apellido Materno</th>
                                    <th scope="col" class="px-3 text-center encabezado">Email</th>
                                    <th scope="col" class="text-center encabezado">Clave Lada</th>
                                    <th scope="col" class="text-center encabezado">Teléfono</th>
                                    <th scope="col" class="text-center encabezado">Fecha de Registro</th>
                                    <th scope="col" class="text-center encabezado">Contraseña</th>
                                    <th scope="col" class="text-center encabezado">Nombre de usuario</th>
                                    <th scope="col" class="text-center encabezado">NIP</th>
                                    <th scope="col" class="text-center encabezado">Cargo</th>
                                    <th scope="col" class="text-center encabezado">Disponibilidad</th>
                                    <th scope="col" class="text-center encabezado">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Asesor de Viajes";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
                                        <th scope="row" class="text-center"><?= $datos->id_empleado ?></th>
                                        <td class="text-center"><?= $datos->nombre ?></td>
                                        <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                        <td class="text-center"><?= $datos->apellido_materno ?></td>
                                        <td class="text-center"><?= $datos->email ?></td>
                                        <td class="text-center"><?= $datos->clave_lada ?></td>
                                        <td class="text-center"><?= $datos->telefono ?></td>
                                        <td class="text-center"><?= $datos->fecha_registro ?></td>
                                        <td class="text-center"><?= $datos->contraseña ?></td>
                                        <td class="text-center"><?= $datos->nombre_usuario ?></td>
                                        <td class="text-center"><?= $datos->NIP ?></td>
                                        <td class="text-center"><?= $datos->cargo ?></td>
                                        <td class="text-center"><?= $datos->disponibilidad ?></td>
                                        <td class="text-center">
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="boton d-flex justify-content-between mb-1">
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning me-3 editar" id="btnEditar2" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                            <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormAsesor">Eliminar seleccionados</button>
                        </div>
                    </div>
                </form>
            </div>
            <div id="Guias" class="table-container">
                <h5 class="modal-title">GUIAS TURISTICOS</h5>
                <br>
                <div class="cabeza">
                    <div class="add">
                        <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                            <i class="fa-solid fa-plus"></i> Agregar Empleado
                        </button>
                    </div>
                    <form id="searchFormGuia" method="POST" action="controlador/buscar_empleados.php">
                        <input type="hidden" name="cargo" value="Guia Turistico"> <!-- Campo oculto -->
                        <div class="input-group mb-3">
                            <select name="campo" class="form-select" required>
                                <option value="nombre">Nombre</option>
                                <option value="apellido_paterno">Apellido Paterno</option>
                                <option value="apellido_materno">Apellido Materno</option>
                                <option value="email">Email</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="botone">Buscar</button>
                        </div>
                    </form>
                </div>




                <!-- TABLA DE USUARIOS -->

                <form id="deleteFormGuia" action="controlador/eliminar_empleado.php" method="post">
                    <div class="table-responsive">
                        <table class="table">
                            <thead class="">
                                <tr>
                                    <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                    <th scope="col" class="text-center encabezado">Código</th>
                                    <th scope="col" class="text-center encabezado">Nombre</th>
                                    <th scope="col" class="text-center encabezado">Apellido Paterno</th>
                                    <th scope="col" class="text-center encabezado">Apellido Materno</th>
                                    <th scope="col" class="px-3 text-center encabezado">Email</th>
                                    <th scope="col" class="text-center encabezado">Clave Lada</th>
                                    <th scope="col" class="text-center encabezado">Teléfono</th>
                                    <th scope="col" class="text-center encabezado">Fecha de Registro</th>
                                    <th scope="col" class="text-center encabezado">Contraseña</th>
                                    <th scope="col" class="text-center encabezado">Nombre de Usuario</th>
                                    <th scope="col" class="text-center encabezado">NIP</th>
                                    <th scope="col" class="text-center encabezado">Cargo</th>
                                    <th scope="col" class="text-center encabezado">Disponibilidad</th>
                                    <th scope="col" class="text-center encabezado">Foto</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                include "modelo/conexion.php";
                                $cargo = "Guia Turistico";
                                $sql = $conexion->query("select * from empleados where cargo = '$cargo'");
                                while ($datos = $sql->fetch_object()) { ?>
                                    <tr>
                                        <td><input type="checkbox" name="ids[]" value="<?= $datos->id_empleado ?>"></td>
                                        <th scope="row" class="text-center"><?= $datos->id_empleado ?></th>
                                        <td class="text-center"><?= $datos->nombre ?></td>
                                        <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                        <td class="text-center"><?= $datos->apellido_materno ?></td>
                                        <td class="text-center"><?= $datos->email ?></td>
                                        <td class="text-center"><?= $datos->clave_lada ?></td>
                                        <td class="text-center"><?= $datos->telefono ?></td>
                                        <td class="text-center"><?= $datos->fecha_registro ?></td>
                                        <td class="text-center"><?= $datos->contraseña ?></td>
                                        <td class="text-center"><?= $datos->nombre_usuario ?></td>
                                        <td class="text-center"><?= $datos->NIP ?></td>
                                        <td class="text-center"><?= $datos->cargo ?></td>
                                        <td class="text-center"><?= $datos->disponibilidad ?></td>
                                        <td class="text-center">
                                            <img src="<?= $datos->img ?>" alt="Imagen del empleado" style="width: 100px; height: 60px;">
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="boton d-flex justify-content-between mb-1">
                        <div class="d-flex">
                            <button type="button" class="btn btn-warning me-3 editar" id="btnEditar3" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                            <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar" data-form-id="deleteFormGuia">Eliminar seleccionados</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php include "modal_empleado/edit_empleado.php"; ?>
    <?php include "modal_empleado/administradores.php"; ?>
    <?php include "modal_empleado/add_empleado.php"; ?>
    <script src="JS/t_empleado.js"></script>
    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <script>
        // SIDEBAR JS

        document.querySelector('.menu-icon').addEventListener('click', () => {
            const nav = document.querySelector('nav');
            const overlay = document.querySelector('.overlay');

            nav.classList.toggle('open');
            overlay.classList.toggle('active');
        });

        document.querySelector('.overlay').addEventListener('click', () => {
            const nav = document.querySelector('nav');
            const overlay = document.querySelector('.overlay');

            nav.classList.remove('open');
            overlay.classList.remove('active');
        });
    </script>
</body>

</html>