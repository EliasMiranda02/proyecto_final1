<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./CSS/hotel.css">
    <link rel="stylesheet" href="./vista/CSS/acceso.css" />
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />
</head>

<body>

    <!-- COMIENZA MENÚ -->

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
                            <li><a href="#">Viajeros</a></li>
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
                            <li><a href="t_reservaspa.php">Paquetes Turísticos</a></li>
                            <li><a href="t_reservasea.php">Excursiones</a></li>
                            <li><a href="#">Alojamiento</a></li>
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


    <!-- TERMINAR MENÚ -->

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE USUARIOS</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class=" col-10">

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
                <form id="searchFormUsuario" class="mb-3" method="POST" action="controlador/buscar_usuario.php">
                    <input type="hidden" name="Usuario" value="Usuario"> <!-- Campo oculto -->
                    <div class="input-group menu">
                        <select name="campo" class="form-select" required>
                            <option value="nombre">Nombre</option>
                            <option value="apellido_paterno">Apellido</option>
                            <option value="email">Corrreo Electrónico</option>
                        </select>
                        <input type="text" class="form-control" name="query" placeholder="Buscar...">
                        <button type="submit" class="botone">Buscar</button>
                    </div>
                </form>
            </div>

            <form id="Clientes" action="controlador/eliminar_usuario.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Nombre</th>
                                <th scope="col" class="text-center encabezado">Apellido Paterno</th>
                                <th scope="col" class="text-center encabezado">Apellido Materno</th>
                                <th scope="col" class="text-center encabezado">Email</th>
                                <th scope="col" class="text-center encabezado">Clave_Lada</th>
                                <th scope="col" class="text-center encabezado">Telefono</th>
                                <th scope="col" class="text-center encabezado">Fecha de Registro</th>
                                <th scope="col" class="text-center encabezado">Contraseña</th>
                                <th scope="col" class="text-center encabezado">Foto</th>
                                <th scope="col" class="text-center encabezado"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM clientes");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_cliente ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_cliente ?></th>
                                    <td class="text-center"><?= $datos->nombre ?></td>
                                    <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                    <td class="text-center"><?= $datos->apellido_materno ?></td>
                                    <td class="text-center"><?= $datos->email ?></td>
                                    <td class="text-center"><?= $datos->clave_lada ?></td>
                                    <td class="text-center"><?= $datos->telefono ?></td>
                                    <td class="text-center"><?= $datos->fecha_registro ?></td>
                                    <td class="text-center"><?= $datos->contraseña ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen del Cliente" style="width: 100px; height: 60px;">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn botones" data-bs-toggle="modal" data-bs-target="#banco" data-id="<?= $datos->id_cliente ?>">Banco</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">
                        <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                    </div>
                </div>
            </form>

        </div>

    </div>

    <?php include "modal_usuario.php"; ?>
    <?php include "modal_usuario/D_bancariosU.php" ?>

    <section class="overlay"></section>
    <script src="./vista/JS/acceso_sidebar.js"></script>
    <script>
        // Para eliminar
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // DATOS BANCARIOS 
        document.addEventListener('DOMContentLoaded', function() {
            const buttonsBanco = document.querySelectorAll('button[data-bs-target="#banco"]');

            buttonsBanco.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const id_cliente = row.querySelector('input[name="ids[]"]').value;
                    const idClienteDisplay = document.getElementById('idClienteDisplay');
                    idClienteDisplay.innerHTML = 'ID Cliente: ' + id_cliente;

                    fetch(`controlador/datos_bancario.php?id_cliente=${id_cliente}`)
                        .then(response => response.json())
                        .then(data => {
                            const datosBancarios = document.getElementById('datosBancarios');
                            datosBancarios.innerHTML = '';

                            if (data.length > 0) {
                                data.forEach(dato => {
                                    datosBancarios.innerHTML += `
                                <p><strong>ID Tarjeta:</strong> ${dato.id_tarjeta}</p>
                                <p><strong>Número de Cuenta:</strong> ${dato.numero_cuenta}</p>
                                <p><strong>Fecha de Vencimiento:</strong> ${dato.fecha_vencimiento}</p>
                                <p><strong>Nombre Titular:</strong> ${dato.nombre_titular}</p>
                                <p><strong>Código de Seguridad:</strong> ${dato.codigo_seguridad}</p>
                                <p><strong>Nombre Banco:</strong> ${dato.nombre_banco}</p>
                                <hr>
                            `;
                                });
                            } else {
                                datosBancarios.innerHTML = '<p>No se encontraron datos bancarios para este cliente.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Error al obtener los datos bancarios:', error);
                        });
                });
            });
        });

        // Oculta el mensaje después de 5 segundos
        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 2000); // 5000 milisegundos = 5 segundos

        document.getElementById('searchFormUsuario').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios

            if (queryValue === "") {
                // Si está vacío, usar un valor especial para indicar "todos los registros"
                formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
            }
            fetch('controlador/buscar_usuario.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    const tbody = document.querySelector('#Clientes table tbody'); // Especifica el tbody correcto
                    tbody.innerHTML = data;
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