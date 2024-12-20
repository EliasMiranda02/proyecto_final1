<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paquetes Turísticos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/paquetes.css">
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
            <h4>REGISTRO DE PAQUETES</h4>
        </div>

    </div>
    <div class="d-flex justify-content-center align-items-center">
        <div class="col-10">

            <!-- ALERTA DE CUANDO SE EJECTUTAN LOS CRUDS -->
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

            <div class="cabeza">

                <div class="add">
                    <!-- AGREGAR PAQUETE -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                        <i class="fa-solid fa-plus"></i> Agregar Paquete
                    </button>
                </div>

                <div class="search">
                    <!-- BUSCADOR -->
                    <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_paquete.php">
                        <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select">
                                <option value="id_paquete">Código</option>
                                <option value="nombre">Nombre</option>
                                <option value="destino">Destino</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="botone">Buscar</button>
                        </div>
                    </form>
                </div>

            </div>



            <form id="Paquetes" action="controlador/eliminar_paquete.php" method="post">
                <!-- Contenedor de la tabla con scroll -->
                <div class="table-container">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Número de Paquete</th>
                                <th scope="col" class="text-center encabezado">Paquete</th>
                                <th scope="col" class="text-center encabezado descripcion">Descripción</th>
                                <th scope="col" class="p-2 text-center encabezado">Precio Aproximado</th>
                                <th scope="col" class="text-center encabezado">Duración</th>
                                <th scope="col" class="text-center encabezado">Destino</th>
                                <th scope="col" class="text-center encabezado">Fecha de Creación</th>
                                <th scope="col" class="text-center encabezado">Fecha de Modificación</th>
                                <th scope="col" class="text-center encabezado">Foto</th>
                                <th scope="col" class="text-center encabezado"></th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            include "modelo/conexion.php";
                            $sql = $conexion->query("SELECT * FROM paquetes");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_paquete ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_paquete ?></th>
                                    <td class="text-center"><?= $datos->numero_paquete ?></td>
                                    <td class="text-center"><?= $datos->nombre ?></td>
                                    <td class="descripcion text-center"><?= $datos->descripcion ?></td>
                                    <td class="text-center"><?= "$" . number_format($datos->precio_aproximado, 2) ?></td>
                                    <td class="text-center"><?= $datos->duracion_dias ?></td>
                                    <td class="text-center"><?= $datos->destino ?></td>
                                    <td><?= $datos->fecha_creacion ?></td>
                                    <td class="text-center"><?= $datos->fecha_modificacion ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen del paquete" style="width: 100px; height: 60px;">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn botones" data-bs-toggle="modal" data-bs-target="#banco" data-id="<?= $datos->id_paquete ?>">Itinerarios</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- Botones fijos debajo de la tabla -->
                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">
                        <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Paquete</button>
                        <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                    </div>
                    <div class="">
                        <button type="button" class="btn botones agregar" onclick="window.location.href='index.php?i=paqueteprecio'">Agregar itinerario</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php include "modal_paquete/delete.php"; ?>
    <?php include "modal_paquete/edit.php"; ?>
    <?php include "modal_paquete/add.php"; ?>
    <?php include "modal_paquete/iterinario.php"; ?>
    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script>
        // PARA EL BOTON DE ELIMINAR
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });


        // PARA EL BOTON DE EDITAR
        btnEditar.addEventListener('click', function(event) {
            const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            event.preventDefault();

            if (checkedCheckboxes.length === 1) {
                const id = checkedCheckboxes[0].value;
                const row = checkedCheckboxes[0].closest('tr');

                // Obtener los datos de la fila
                const nombre = row.cells[3].innerText;
                const descripcion = row.cells[4].innerText;
                const precio_aproximado = row.cells[5].innerText.replace('$', '').trim(); // Eliminamos el símbolo de moneda
                const duracion_dias = row.cells[6].innerText;
                const destino = row.cells[7].innerText;
                const fecha_creacion = row.cells[8].innerText;
                const fecha_modificacion = row.cells[9].innerText;
                const imagen = row.cells[10].querySelector('img').src;

                // Llenar los campos del modal
                document.getElementById('id_paquete_editar').value = id;
                document.getElementById('nombres').value = nombre;
                document.getElementById('descripcion').value = descripcion;

                // Formatear el precio como moneda antes de asignarlo
                document.getElementById('precios').value = formatMoneda(precio_aproximado);

                document.getElementById('duracion').value = duracion_dias;
                document.getElementById('destino').value = destino;
                document.getElementById('fecha_creacion').value = fecha_creacion.replace(" ", "T").slice(0, 16);
                document.getElementById('fecha_modificacion').value = fecha_modificacion.replace(" ", "T").slice(0, 16);
                document.getElementById('imagen').src = imagen;

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

        // ELIMINAR EL MENSAJE EN 2 SEGUNDOS
        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 1000);

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
            fetch('controlador/buscar_paquete.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    // Actualizar el contenido de la tabla con los resultados de la búsqueda
                    document.getElementById('table-body').innerHTML = data;

                    // Reasignar el evento de clic para los botones de itinerarios
                    assignItineraryButtonEvents();
                })
                .catch(error => console.error('Error:', error));
        });

        // Función para asignar eventos a los botones de itinerarios
        function assignItineraryButtonEvents() {
            const buttonsBanco = document.querySelectorAll('button[data-bs-target="#banco"]');

            buttonsBanco.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const id_paquete = row.querySelector('input[name="ids[]"]').value;
                    const idPaqueteDisplay = document.getElementById('idPaqueteDisplay');
                    idPaqueteDisplay.innerHTML = 'ID Paquete: ' + id_paquete;

                    // Realizar la solicitud para obtener los itinerarios
                    fetch(`controlador/datos_iterinarios.php?id_paquete=${id_paquete}`)
                        .then(response => response.json())
                        .then(data => {
                            const datosBancarios = document.getElementById('datosBancarios');
                            datosBancarios.innerHTML = '';

                            if (data.length > 0) {
                                // Mostrar los datos de cada itinerario sin tabla
                                data.forEach(dato => {
                                    datosBancarios.innerHTML += `
                                <p><strong>ID Itinerario:</strong> ${dato.id_itinerario}</p>
                                <p><strong>Día:</strong> ${dato.dia}</p>
                                <p><strong>Hora:</strong> ${dato.hora}</p>
                                <P><strong>Nombre:</strong> ${dato.nombre_actividad}</P> 
                                <p><strong>Detalle:</strong> ${dato.detalle}</p>
                                <hr>
                            `;
                                });
                            } else {
                                datosBancarios.innerHTML = '<p>No se encontraron Itinerarios para este Paquete.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Error al obtener los datos del Itinerario:', error);
                        });
                });
            });
        }

        // Llama a la función una vez al cargar la página para asegurar que los botones tengan eventos asignados
        assignItineraryButtonEvents();


        // JS PARA HACER LA IMAGEN APAREZCA
        function actualizarImg() {
            const $inputfile = document.querySelector("#sellImg"),
                $imgcliente = document.querySelector("#image1");

            // Establece la imagen por defecto al cargar
            const defaultImg = "IMG/paquete.png";
            $imgcliente.src = defaultImg;

            $inputfile.addEventListener("change", function() {
                const files = $inputfile.files;
                if (!files || !files.length) {
                    // Si no hay archivos seleccionados, vuelve a la imagen por defecto
                    $imgcliente.src = defaultImg;
                    return;
                }

                // Si hay un archivo seleccionado, reemplaza la imagen por el archivo seleccionado
                const archivoInicial = files[0];
                const Url = URL.createObjectURL(archivoInicial);
                $imgcliente.src = Url;
            });
        }
        // Llamada a la función
        actualizarImg();


        // JS PARA HACER CAMBIO DE IMAGEN EN EL MODAL DE EDITAR
        function actualizarImg1() {
            const $inputfile = document.querySelector("#selImg"),
                $imgcliente = document.querySelector("#imagen");

            // Establece la imagen por defecto al cargar
            const defaultImg = "IMG/logoempleado1.png";
            $imgcliente.src = defaultImg;

            $inputfile.addEventListener("change", function() {
                const files = $inputfile.files;
                if (!files || !files.length) {
                    // Si no hay archivos seleccionados, vuelve a la imagen por defecto
                    $imgcliente.src = defaultImg;
                    return;
                }

                // Si hay un archivo seleccionado, reemplaza la imagen por el archivo seleccionado
                const archivoInicial = files[0];
                const Url = URL.createObjectURL(archivoInicial);
                $imgcliente.src = Url;
            });
        }
        actualizarImg1();

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