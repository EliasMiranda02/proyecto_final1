<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <!-- LINKS DE MARCELA -->
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
            <h4>REGISTRO DE RENTA DE CARROS</h4>
        </div>

    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">
            <!-- BUSACDOR DE LAS RECORRIDOS -->
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
                    }
                    ?>
                </div>
            <?php endif; ?>
            <div class="cabeza">
                <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_Rcarro.php">
                    <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                    <div class="input-group">
                        <select name="campo" class="form-select">
                            <option value="id_renta">Código de renta</option>
                            <option value="id_carro">Código de carro</option>
                            <option value="id_cliente">Código de cliente</option>
                        </select>
                        <input type="text" class="form-control" name="query" placeholder="Buscar...">
                        <button type="submit" class="botone">Buscar</button>
                    </div>
                </form>
            </div>

            <!-- TABLA DE RECORRIDOS -->
            <div class="table-responsive">
                <table class="table" id="table-body">
                    <thead class="">
                        <tr>
                        <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                            <th scope="col" class="text-center encabezado">Código</th>
                            <th scope="col" class="text-center encabezado">Código del Carro</th>
                            <th scope="col" class="text-center encabezado">Fecha de Renta</th>
                            <th scope="col" class="text-center encabezado">Fecha de Devolución</th>
                            <th scope="col" class="text-center encabezado">Estado de la Renta</th>
                            <th scope="col" class="text-center encabezado">Días Rentados</th>
                            <th scope="col" class="text-center encabezado">Total</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        include "modelo/conexion.php";
                        $sql = $conexion->query("SELECT * FROM renta_carros");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                            <td><input type="checkbox" name="ids[]" value="<?= $datos->id_renta ?>"></td>
                                <th scope="row" class="text-center"><?= $datos->id_renta ?></th>
                                <td class="text-center"><?= $datos->id_carro ?></td>
                                <td class="text-center"><?= $datos->fecha_renta ?></td>
                                <td class="text-center"><?= $datos->fecha_devolucion ?></td>
                                <td class="text-center"><?= $datos->estado_renta ?></td>
                                <td class="text-center"><?= $datos->dias_rentados ?></td>
                                <td class="text-center"><?= $datos->total ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            

            <div class="boton d-flex justify-content-between mb-1">
                <div class="d-flex">
                <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Disponibilidad</button>
                </div>
                <div class="fixed-buttons">
                    <button type="button" class="btn botones agregar" onclick="window.location.href='index.php?i=pagosrc'">Pagos</button>
                </div>
            </div>

        </div>

    </div>

    <?php include "modal_rentacarros/modal_editar.php"; ?>
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
            fetch('controlador/buscar_Rcarro.php', {
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
        btnEditar.addEventListener('click', function(event) {
    const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

    // Prevenir el comportamiento por defecto del botón
    event.preventDefault();

    // Comprobar si hay exactamente un checkbox seleccionado
    if (checkedCheckboxes.length === 1) {
        const id = checkedCheckboxes[0].value;
        const row = checkedCheckboxes[0].closest('tr');

        // Obtener los datos de la fila
        const disponibilidad = row.cells[5].innerText;

        // Llenar los campos del modal
        document.getElementById('id_rentacarro_editar').value = id;
        document.getElementById('disponibilidad').value = disponibilidad;

        // Abrir el modal
        $('#editar').modal('show');
    } else {
        // Solo mostrar la alerta, sin abrir el modal
        alert('Por favor, selecciona un único registro para editar.');
    }
});

// Enviar el formulario al hacer clic en "Guardar Cambios"
document.getElementById('confirmarEditar').addEventListener('click', function () {
document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
});
setTimeout(function() {
    const mensajeAlerta = document.getElementById('mensajeAlerta');
    if (mensajeAlerta) {
        mensajeAlerta.style.display = 'none';
    }
}, 2000); // 5000 milisegundos = 5 segundos
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>