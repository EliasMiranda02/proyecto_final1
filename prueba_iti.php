<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Paquete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/itinerario.css">
</head>

<body>
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
    <form action="controlador/add_itinerario.php" method="post" enctype="multipart/form-data">

        <div class="container mt-5 mb-3">
            <div class="formulario p-0">

                <div class="paquetes">

                    <h4>Paquetes:</h4>

                    <!-- SECCION PARA PAQUETES -->
                    <div class="mb-3">
                        <label for="packageId" class="form-label">Paquete</label>
                        <select class="form-select" name="packageId" id="packageId" onchange="fillPackageData()">
                            <option value="">Selecciona un paquete</option>
                            <!-- Las opciones serán cargadas dinámicamente con JavaScript -->
                        </select>
                    </div>

                    <input type="hidden" id="selectedPackageId" name="selectedPackageId">

                    <div class="cabeza">

                        <div class="mb-3">
                            <label for="packageNumber" class="form-label">Número de Paquete</label>
                            <input type="text" class="form-control numero" id="packageNumber" placeholder="Número de Paquete" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="duration" class="form-label">Duración (días)</label>
                            <input type="number" class="form-control duracion" id="duration" placeholder="Duración en días" readonly>
                        </div>
                    </div>
                    <div class="sesion">
                        <div class="mb-3">
                            <label for="packageName" class="form-label">Nombre del Paquete</label>
                            <input type="text" class="form-control nombre" id="packageName" placeholder="Nombre del Paquete" readonly>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="destination" class="form-label">Destino</label>
                                <input type="text" class="form-control destino" id="destination" placeholder="Destino" readonly>
                            </div>
                            <br>

                        </div>
                    </div>


                </div>




                <div class="tabla">

                    <div class="">
                        <div class="col-102">
                            <div class="table-container">
                                <table class="table table-bordered table-container">
                                    <thead>
                                        <tr>
                                            <th scope="col" class="p-3"><input type="hidden" id="selectAll"></th>
                                            <th scope="col" class="text-center">Actividad</th>
                                            <th scope="col" class="text-center">fecha</th>
                                            <th scope="col">hora</th>
                                            <th scope="col" class="p-2">detalle</th>
                                            <th scope="col" class="text-center">Precio</th>
                                        </tr>
                                    </thead>
                                    <tbody id="itinerarioTableBody">

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- TERMINA TABLA -->
                    <br>
                        <div class="d-flex align-items-center mb-0 botones">

                            <div class="">
                                <label for="numeros" class="form-label">Precio Total:</label>
                                <input type="text" id="precio_total" name="precio_total" class="form-control">
                            </div>

                            <div class="fixed-buttons text-right">
                                <button type="submit" class="btn btn-primary boton">Nuevo itinerario</button>
                            </div>

                        </div>
                </div>



            </div>
        </div>



        <div class="actividades">

            <!--SECCION  PARA ITINERARIO -->
            <h4>Lista de Actividades:</h4>

            <div class="lista1 mb-3">
                <div class="">
                    <label for="dates" class="form-label">Dia:</label>
                    <input type="text" id="dia" name="dia" class="form-control dias">
                </div>

                <div class="">
                    <label for="times" class="form-label">Hora:</label>
                    <input type="time" id="hora" name="hora" class="form-control">
                </div>
                <br>

                <div class="">
                    <label for="packageId" class="form-label">Actividad:</label>
                    <input type="text" class="form-control act" id="actividad" name="actividad">
                </div>
            </div>

            <div class="lista">

                <div class="col-md-4 mb-3">
                    <label for="descripcion" class="form-label">Detalle</label>
                    <textarea name="detalle" id="detalle" class="form-control detalles" rows="3"></textarea>
                </div>

                <div class="col-md-2 mb-2">
                    <label for="numeros" class="form-label">Precio:</label>
                    <br>
                    <input type="text" id="precio" name="precio" class="form-control precios">
                </div>
                <br>
                <div class=" d-flex align-items-center mb-0">
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
        <!-- SECCION PARA LA TABLA -->
    </form>
    <br><br>


    <script src="JS/prueba.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>