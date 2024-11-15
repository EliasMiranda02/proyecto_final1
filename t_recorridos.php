<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recorridos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./CSS/hotel.css">
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/LOGO_TABLAS.jpg" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE RECORRIDOS</h4>
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

            <div class="cabeza">

            <div class="add">
                    <!-- AGREGAR PAQUETE -->
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                        <i class="fa-solid fa-plus"></i> Agregar Recorrido
                    </button>
                </div>
                
                
                <div class="search">
                    <!-- BUSACDOR DE LAS RECORRIDOS -->
                    <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_recorrido.php">
                        <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select">
                                <option value="id_recorrido">Código</option>
                                <option value="fecha_salida">Fecha de Salida</option>
                                <option value="fecha_llegada">Fecha de Llegada</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="btn botones">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>

            

            <!-- TABLA DE RECORRIDOS -->
            <form id="Recorrido" action="controlador/delete_recorrido.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Código de Ruta</th>
                                <th scope="col" class="text-center encabezado">Fecha de Salida</th>
                                <th scope="col" class="text-center encabezado">Fecha de Llegada</th>
                                <th scope="col" class="text-center encabezado">Precio del Boleto</th>
                                <th scope="col" class="text-center encabezado">Estado</th>
                            </tr>
                        </thead>
                        <tbody id="table-body">
                            <?php
                            include "modelo/conexion.php";
                            $sql = $conexion->query("SELECT * FROM recorridos");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_recorrido ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_recorrido ?></th>
                                    <td class="text-center"><?= $datos->id_ruta ?></td>
                                    <td class="text-center"><?= $datos->fecha_salida ?></td>
                                    <td class="text-center"><?= $datos->fecha_llegada ?></td>
                                    <td class="text-center"><?= $datos->precio_boleto ?></td>
                                    <td class="text-center"><?= $datos->estado ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="boton d-flex justify-content-between mb-1">
                    <div class="d-flex">
                        <button type="button" class="btn btn-warning me-3 editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                        <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
                    </div>
                    <div class="fixed-buttons">
                        <button type="button" class="btn botones agregar" onclick="window.location.href='rutas.php'">Rutas</button>
                    </div>
                </div>


            </form>
        </div>

    </div>

    <?php

    $sqlrutas = "SELECT id_ruta FROM rutas";
    $rutas = $conexion->query($sqlrutas);

    ?>


    <?php include "modal_recorrido/editar.php"; ?>
    <?php include "modal_recorrido/delete.php"; ?>
    <?php include "modal_recorrido/add.php"; ?>

    <script>
        // PARA EDITAR
        btnEditar.addEventListener('click', function(event) {
            const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            event.preventDefault();

            if (checkedCheckboxes.length === 1) {
                const id = checkedCheckboxes[0].value;
                const row = checkedCheckboxes[0].closest('tr');

                // Obtener los datos de la fila
                const fecha_salida = row.cells[3].innerText;
                const fecha_llegada = row.cells[4].innerText;
                const boleto = row.cells[5].innerText;
                const estado = row.cells[6].innerText;

                // Llenar los campos del modal
                document.getElementById('id_recorrido_editar').value = id;
                document.getElementById('date_salida').value = fecha_salida.replace(" ", "T").slice(0, 16);
                document.getElementById('date_llegada').value = fecha_llegada.replace(" ", "T").slice(0, 16);
                document.getElementById('boleto').value = boleto;
                document.getElementById('estados').value = estado;
                document.getElementById('estado').value = estado;

                // Abrir el modal
                $('#editar').modal('show');
            } else {
                alert('Por favor, selecciona un único registro para editar.');
            }

            document.getElementById('confirmarEditar').addEventListener('click', function() {
                document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
            });
        });

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
            fetch('controlador/buscar_recorrido.php', {
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>