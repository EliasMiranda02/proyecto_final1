<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/hotel.css">
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
                            <li><a href="index.php?i=reservapv">Paquetes Turísticos</a></li>
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
            <h4>REGISTRO DE VUELOS</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">

            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info mb-3" id="mensajeAlerta">
                    <?php
                    switch ($_GET['mensaje']) {
                        case 'actualizado':
                            echo "Registro actualizado correctamente.";
                            break;
                        case 'error':
                            echo "Hubo un error: " . ($_GET['detalle'] ?? '');
                            break;
                        case 'no_id':
                            echo "No se seleccionó ningún registro.";
                            break;
                        case 'eliminado':
                            echo "Registros eliminados correctamente.";
                            break;
                        case 'id_invalido':
                            echo "ID de registro inválido.";
                            break;
                        case 'registro_exitoso':
                            echo "Registro guardado correctamente.";
                            break;
                    }
                    ?>
                </div>
            <?php endif; ?>
            <!-- BUSACDOR DE LAS RUTAS -->
            <div class="cabeza">
                <div class="add">

                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                        <i class="fa-solid fa-plus"></i> Agregar Vuelo

                </div>


                <div class="search">

                    <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_vuelo.php">
                        <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select">
                                <option value="numero_vuelo">No_vuelo</option>
                                <option value="origen">Origen</option>
                                <option value="destino">Destino</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="botone">Buscar</button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- TABLA DE RUTAS -->
            <form id="Recorrido" action="controlador/delete_vuelo.php" method="post">
                <div class="table-responsive">
                    <table class="table" id="table-body">
                        <thead class="">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Número de Vuelo</th>
                                <th scope="col" class="text-center encabezado">Origen</th>
                                <th scope="col" class="text-center encabezado">Destino</th>
                                <th scope="col" class="text-center encabezado">Fecha de Salida</th>
                                <th scope="col" class="text-center encabezado">Hora de Salida</th>
                                <th scope="col" class="text-center encabezado">Fecha de Llegada</th>
                                <th scope="col" class="text-center encabezado">Hora de Llegada</th>
                                <th scope="col" class="text-center encabezado">Precio de Vuelo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";
                            $sql = $conexion->query("SELECT * FROM vuelos");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_vuelo ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_vuelo ?></th>
                                    <td class="text-center"><?= $datos->numero_vuelo ?></td>
                                    <td class="text-center"><?= $datos->origen ?></td>
                                    <td class="text-center"><?= $datos->destino ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->hora_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_llegada ?></td>
                                    <td class="text-center"><?= $datos->hora_llegada ?></td>
                                    <td class="text-center"><?= "$" . number_format($datos->precio_vuelo, 2) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-warning editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Vuelo</button>
                <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
            </form>
        </div>

    </div>

    <?php include "modal_vuelo/delete.php"; ?>
    <?php include "modal_vuelo/edit.php"; ?>
    <? include "modal_vuelo/add.php"; ?>

    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script>
        // PARA EDITAR
        btnEditar.addEventListener('click', function(event) {
            const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            event.preventDefault();

            if (checkedCheckboxes.length === 1) {
                const id = checkedCheckboxes[0].value;
                const row = checkedCheckboxes[0].closest('tr');

                // Obtener los datos de la fila
                const no_vuelo = row.cells[2].innerText;
                const origen = row.cells[3].innerText;
                const destino = row.cells[4].innerText;
                const fecha_salida = row.cells[5].innerText;
                const fecha_llegada = row.cells[7].innerText;
                const precio = row.cells[9].innerText.replace('$', '').trim();

                const hora_salida = row.cells[6].innerText;
                const hora_llegada = row.cells[8].innerText;

                // Llenar los campos del modal
                document.getElementById('id_vuelo_editar').value = id;
                document.getElementById('no_vuelo').value = no_vuelo;
                document.getElementById('origen').value = origen;
                document.getElementById('destino').value = destino;
                document.getElementById('date_salida').value = fecha_salida.replace(" ", "T").slice(0, 16);
                document.getElementById('date_llegada').value = fecha_llegada.replace(" ", "T").slice(0, 16);
                document.getElementById('precio').value = formatMoneda(precio);

                document.getElementById('time_salidas').value = hora_salida.trim();
                document.getElementById('time_llegadas').value = hora_llegada.trim();

                // Abrir el modal
                $('#editar').modal('show');
            } else {
                alert('Por favor, selecciona un único registro para editar.');
            }

            document.getElementById('confirmarEditar').addEventListener('click', function() {
                document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
            });
        });

        // Función para formatear el número como moneda
        function formatMoneda(valor) {
            const numero = parseFloat(valor.replace(',', '')) || 0; // Eliminar comas y convertir a número
            return new Intl.NumberFormat('es-MX', {
                style: 'currency',
                currency: 'MXN',
                minimumFractionDigits: 2,
                maximumFractionDigits: 2
            }).format(numero); // Formato con 2 decimales
        }


        // PARA ELIMINAR
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // ELIMINAR EL MENSAJE EN 2 SEGUNDOS
        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 1000);

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
            fetch('controlador/buscar_vuelo.php', {
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