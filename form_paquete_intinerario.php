<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario de Paquete</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="CSS/paquete_itinerario.css">
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
  <div class="paquete">
    <div class="imagen">
      <img src="IMG/LOGO_TABLAS.jpg" alt="">
    </div>

    <div class="logo">
      <h4>REGISTRO DE ITINERARIOS</h4>
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
  <form id="nuevoItinerarioForm" action="controlador/add_itinerario.php" method="post" enctype="multipart/form-data">

    <div class="container mt-5">
      <div class="formulario p-0">

        <div class="seccion1">

          <div class="paquetes">

            <div class="mb-3">
              <label for="packageId" class="form-label">Paquete</label>
              <select class="form-select" name="packageId" id="packageId" onchange="fillPackageData()" required>
                <option value="">Selecciona un paquete</option>
                <!-- Las opciones serán cargadas dinámicamente con JavaScript -->
              </select>
            </div>
            <input type="hidden" id="selectedPackageId" name="selectedPackageId">
            <div class="section1">
              <div class="mb-3">
                <label for="packageName" class="form-label">Nombre del Paquete</label>
                <input type="text" class="form-control nombre" id="packageName" placeholder="Nombre del Paquete" readonly>
              </div>
              <div class="mb-3">
                <label for="packageNumber" class="form-label">Número de Paquete</label>
                <input type="text" class="form-control numero" id="packageNumber" placeholder="Número de Paquete" readonly>
              </div>
            </div>
            <div class="section1">
              <div class="mb-3">
                <label for="destination" class="form-label">Destino</label>
                <input type="text" class="form-control destino" id="destination" placeholder="Destino" readonly>
              </div>
              <div class="mb-3">
                <label for="duration" class="form-label">Duración (días)</label>
                <input type="number" class="form-control dias" id="duration" placeholder="Duración en días" readonly>
              </div>
            </div>

          </div>

          <div class="listas mb-3">

            <div class="input-group mb-3">
              <span class="input-group-text">Transporte</span>
              <input type="text" class="form-control" id="transporte" oninput="formatCurrency(this)" aria-label="Amount (to the nearest dollar)" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Alojamiento</span>
              <input type="text" class="form-control" id="alojamiento" oninput="formatCurrency(this)" aria-label="Amount (to the nearest dollar)" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Actividades</span>
              <input type="text" class="form-control" id="actividades" oninput="formatCurrency(this)" aria-label="Amount (to the nearest dollar)" required>
            </div>

            <div class="input-group mb-3">
              <span class="input-group-text">Alimentación</span>
              <input type="text" class="form-control" id="alimentacion" oninput="formatCurrency(this)" aria-label="Amount (to the nearest dollar)" required>
            </div>

            <hr class="linea">
            <!-- SUMA TOTAL DE transporte, alojamiento, actividades y alimentacion -->
            <div class="input-group mb-1">
              <span class="input-group-text">Total</span>
              <input type="text" id="precio_total" name="precio_total" class="form-control" readonly>
            </div>

          </div>

        </div>

        <div class="lista_actividad">

          <!-- PARA ITINERARIO -->
          <h4>Lista de Actividades:</h4>

          <div class="row lista1">

            <div class="col-md-1 mb-3">
              <label for="dates" class="form-label">Dia:</label>
              <input type="number" min="1" id="dia" name="dia" class="form-control">
            </div>

            <div class="col-md-2 mb-3">
              <label for="times" class="form-label">Hora:</label>
              <input type="time" id="hora" name="hora" class="form-control">
            </div>
            <br>
          </div>

          <div class="col-md-6 mb-3">
            <label for="packageId" class="form-label">Actividad:</label>
            <input type="combobox" class="form-control act" id="actividad" name="actividad">
          </div>

          <div class="row lista">
            <div class="col-md-4 mb-3">
              <label for="descripcion" class="form-label">Detalle</label>
              <textarea name="detalle" id="detalle" class="form-control" rows="3"></textarea>
            </div>
            <br>
            <!-- BOTONES -->
            <div class="col-md-4 d-flex align-items-center mb-9">
              <!-- Boton para agregar itinerario a la tabla -->
              <button type="button" id="agregar1" class="btn btn-success me-2">
                <i class="fa-solid fa-plus"></i>
              </button>
              <!-- Boton para quitar itinerario de la tabla -->
              <button id="eliminar1" class="btn btn-danger">
                <i class="fa-solid fa-x"></i>
              </button>
            </div>

          </div>

        </div>



      </div>
    </div>
    <!-- PARA LA TABLA -->

    <div class="d-flex justify-content-center align-items-center p-100vh">
      <div class="col-10">
        <div class="table-container">
          <table class="table table-bordered table-container">
            <thead>
              <tr>
                <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                <th scope="col" class="text-center encabezado">Actividad</th>
                <th scope="col" class="text-center encabezado">Fecha</th>
                <th scope="col" class="encabezado">Hora</th>
                <th scope="col" class="p-2 encabezado">Detalle</th>
              </tr>
            </thead>
            <tbody id="itinerarioTableBody">

            </tbody>
          </table>
        </div>
      </div>
    </div>
    <!-- TERMINA TABLA -->

    <div class="container mt-4">
      <div class="">
        <div class="fixed-buttons text-right">
          <button type="submit" class="btn boton">Nuevo itinerario</button>
        </div>

      </div>

    </div>


  </form>


  <br><br>

  <section class="overlay"></section>
  <script src="./vista/JS/acceso_sidebar.js"></script>
  <script src="JS/form_precio.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>