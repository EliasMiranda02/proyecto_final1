<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/hotel.css">
    !-- LINKS DE MARCELA -->
    <link rel="stylesheet" href="vista/CSS/acceso.css" />
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
                            <li><a href="index.php?i=usuario">Viajeros</a></li>
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
                            <li><a href="index.php?i=paquete">Paquetes Turísticos</a></li>
                            <li><a href="index.php?i=excursion">Excursiones</a></li>
                            <li><a href="index.php?i=hotel">Hospedaje</a></li>
                        </ul>
                    </li>

                    <li class="list">
                        <a href="index.php?i=volante" class="nav-link">
                            <i class='bx bxs-plane-alt icon'></i>
                            <span class="link">Chiapas Volante</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="index.php?i=ruta" class="nav-link">
                            <i class='bx bxs-bus icon'></i>
                            <span class="link">Chiapas Rodante</span>
                        </a>
                    </li>

                    <li class="list">
                        <a href="index.php?i=catacarro" class="nav-link">
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
                            <li><a href="index.php?i=reservapa">Paquetes Turísticos (A)</a></li>
                            <li><a href="index.php?i=reservapv">Paquetes Turísticos (B)</a></li>
                            <li><a href="index.php?i=reservaea">Excursiones</a></li>
                            <li><a href="index.php?i=reservav">Reservas de Vuelos</a></li>
                            <li><a href="index.php?i=rentacarro">Renta de Vehículos</a></li>
                        </ul>
                    </li>

                    <li class="list">
                        <a href="index.php?i=calificacion" class="nav-link">
                            <i class='bx bxs-chat icon'></i>
                            <span class="link">Calificaciones</span>
                        </a>
                    </li>
                </ul>

                <div class="botton-content">
                    <li class="list">
                        <a href="index.php?i=home" class="nav-linki">
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
            <h4>REGISTRO DE PAGOS RC</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">

            <!-- BUSACDOR DE LAS RECORRIDOS -->
            <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_pagosrc.php">
                <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="id_pagorc">Código de Pago</option>
                        <option value="id_renta">Código de Renta</option>
                        <option value="id_tarjeta">Código de Tarjeta</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="botone">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RECORRIDOS -->

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col" class="text-center encabezado">Código</th>
                        <th scope="col" class="text-center encabezado">Código de la Renta</th>
                        <th scope="col" class="text-center encabezado">Código de la Tarjeta</th>
                        <th scope="col" class="text-center encabezado">Fecha de Pago</th>
                        <th scope="col" class="text-center encabezado">Monto Total</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM pagos_rc");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row" class="text-center"><?= $datos->id_pagorc ?></th>
                            <td class="text-center"><?= $datos->id_renta ?></td>
                            <td class="text-center"><?= $datos->id_tarjeta ?></td>
                            <td class="text-center"><?= $datos->fecha_pago ?></td>
                            <td class="text-center"><?= $datos->monto_total ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

    </div>
    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script>
        // PARA HACER EL BUSCACOR
        document.getElementById('searchFormAsesor').addEventListener('submit', function(event) {
            event.preventDefault();

            const formData = new FormData(this);
            const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios

            // Verificar si el campo de búsqueda está vacío
            if (queryValue === "") {
                // Si está vacío, usar un valor especial para indicar "todos los registros"
                formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
            }

            // Realizar la solicitud AJAX
            fetch('controlador/buscar_pagosrc.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Actualizar el contenido de la tabla con los resultados de la búsqueda
                    document.getElementById('table-body').innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
        
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>