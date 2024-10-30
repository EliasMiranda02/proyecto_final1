<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RUTAS</title>
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
                            echo "Usuario actualizado correctamente.";
                            break;
                        case 'error':
                            echo "Hubo un error: " . ($_GET['detalle'] ?? '');
                            break;
                        case 'no_id':
                            echo "No se seleccionó ningún usuario para editar.";
                            break;
                        case 'eliminado':
                            echo "Registros eliminados correctamente.";
                            break;
                        case 'id_invalido':
                            echo "ID de usuario inválido.";
                            break;
                    }
                    ?>
                </div>
            <?php endif; ?>

            <div class="col-auto">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar"><i class="fa-solid fa-circle-plus"></i></a>
                <i>Nueva Ruta</i>
            </div>
            <br>
            <!-- BUSACDOR DE LAS RUTAS -->

            <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_ruta.php">
                <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="origen">Origen</option>
                        <option value="destino">Destino</option>
                        <option value="matricula">Matricula</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RUTAS -->
            <form id="Rutas" action="controlador/delete.php" method="post">
                <table class="table" id="table-body">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col"><input type="hidden" id="selectAll"></th>
                            <th scope="col">id_ruta</th>
                            <th scope="col">origen</th>
                            <th scope="col">destino</th>
                            <th scope="col">distancia</th>
                            <th scope="col" class="text-center">duracion</th>
                            <th scope="col" class="text-center">matricula</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";
                        $sql = $conexion->query("SELECT * FROM rutas");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_ruta ?>"></td>
                                <th scope="row"><?= $datos->id_ruta ?></th>
                                <td><?= $datos->origen ?></td>
                                <td><?= $datos->destino ?></td>
                                <td><?= $datos->distancia ?></td>
                                <td><?= $datos->duracion ?></td>
                                <td class="text-center"><?= $datos->matricula ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
            </form>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-primary" onclick="window.location.href='t_recorridos.php'">Recorridos</button>
            </div>
        </div>

    </div>
    <?php include "Rutas/delete.php"; ?>
    <?php include "Rutas/edit.php"; ?>
    <?php include "Rutas/add.php"; ?>

    <script>
        // PARA EDITAR

        btnEditar.addEventListener('click', function(event) {

            const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            // Prevenir el comportamiento por defecto del botón
            event.preventDefault();

            // Comprobar si hay exactamente un checkbox seleccionado
            if (checkedCheckboxes.length === 1) {
                const id = checkedCheckboxes[0].value;
                const row = checkedCheckboxes[0].closest('tr');

                // Obtener los datos de la fila
                const origen = row.cells[2].innerText; // Asegúrate de que los índices son correctos
                const destino = row.cells[3].innerText;
                const distancia = row.cells[4].innerText;
                const duracion = row.cells[5].innerText; // Verifica el índice
                const matricula = row.cells[6].innerText; // Asegúrate de que este es el índice correcto para contraseña
                // Llenar los campos del modal
                document.getElementById('id_ruta_editar').value = id;
                document.getElementById('origen').value = origen;
                document.getElementById('destino').value = destino;
                document.getElementById('distancia').value = distancia;
                document.getElementById('duracion').value = duracion;
                document.getElementById('matricula').value = matricula;
                // Abrir el modal
                $('#editar').modal('show');
            } else {
                // Solo mostrar la alerta, sin abrir el modal
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
            fetch('controlador/buscar_ruta.php', {
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