<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Volante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-8 p-2">

            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info" id="mensajeAlerta">
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
            <div class="col-auto">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar"><i class="fa-solid fa-circle-plus"></i></a>
                <i>Nuevo Vuelo</i>
            </div>
            <br>
            <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_vuelo.php">
                <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="numero_vuelo">No_vuelo</option>
                        <option value="origen">Origen</option>
                        <option value="destino">Destino</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RUTAS -->
            <form id="Recorrido" action="controlador/delete_vuelo.php" method="post">
                <table class="table" id="table-body">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col"><input type="hidden" id="selectAll"></th>
                            <th scope="col">id_vuelo</th>
                            <th scope="col">numero_vuelo</th>
                            <th scope="col">origen</th>
                            <th scope="col">destino</th>
                            <th scope="col" class="text-center">fecha_salida</th>
                            <th scope="col" class="text-center">fecha_llegada</th>
                            <th scope="col">precio_vuelo</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";
                        $sql = $conexion->query("SELECT * FROM vuelos");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_vuelo ?>"></td>
                                <th scope="row"><?= $datos->id_vuelo ?></th>
                                <td><?= $datos->numero_vuelo ?></td>
                                <td><?= $datos->origen ?></td>
                                <td><?= $datos->destino ?></td>
                                <td><?= $datos->fecha_salida ?></td>
                                <td><?= $datos->fecha_llegada ?></td>
                                <td><?= $datos->precio_vuelo ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
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
                const precio = row.cells[7].innerText;

                // Llenar los campos del modal
                document.getElementById('id_vuelo_editar').value = id;
                document.getElementById('no_vuelo').value = no_vuelo;
                document.getElementById('origen').value = origen;
                document.getElementById('destino').value = destino;
                document.getElementById('date_salida').value = fecha_salida.replace(" ", "T").slice(0, 16);
                document.getElementById('date_llegada').value = fecha_llegada.replace(" ", "T").slice(0, 16);
                document.getElementById('precio').value = precio;
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