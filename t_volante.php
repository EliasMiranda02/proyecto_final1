<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/hotel.css">
</head>

<body>
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
                            <button type="submit" class="btn botones">Buscar</button>
                        </div>
                    </form>

                </div>
            </div>

            <!-- TABLA DE RUTAS -->
            <form id="Recorrido" action="controlador/delete_vuelo.php" method="post">
                <div class="table-responsive">
                    <table class="table" id="table-body">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Número de Vuelo</th>
                                <th scope="col" class="text-center encabezado">Origen</th>
                                <th scope="col" class="text-center encabezado">Destino</th>
                                <th scope="col" class="text-center encabezado">Fecha de Salida</th>
                                <th scope="col" class="text-center encabezado">Fecha de Llegada</th>
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
                                    <td class="text-center"><?= $datos->fecha_llegada ?></td>
                                    <td class="text-center"><?= "$" . number_format($datos->precio_vuelo, 2) ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-warning editar" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
                <button type="button" class="btn btn-danger eliminar" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
            </form>
        </div>

    </div>

    <?php include "modal_vuelo/delete.php"; ?>
    <?php include "modal_vuelo/edit.php"; ?>
    <? include "modal_vuelo/add.php"; ?>

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
                const fecha_llegada = row.cells[6].innerText;
                const precio = row.cells[7].innerText.replace('$', '').trim();

                // Llenar los campos del modal
                document.getElementById('id_vuelo_editar').value = id;
                document.getElementById('no_vuelo').value = no_vuelo;
                document.getElementById('origen').value = origen;
                document.getElementById('destino').value = destino;
                document.getElementById('date_salida').value = fecha_salida.replace(" ", "T").slice(0, 16);
                document.getElementById('date_llegada').value = fecha_llegada.replace(" ", "T").slice(0, 16);
                document.getElementById('precio').value = formatMoneda(precio);
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>