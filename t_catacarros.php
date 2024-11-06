<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros</title>
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
            <div class="col-auto">
                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregar"><i class="fa-solid fa-circle-plus"></i></a>
                <i>Nuevo Carro</i>
            </div>
            <br>
            <!-- BUSACDOR DE LAS RECORRIDOS -->
            <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_catacarro.php">
                <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="capacidad">Capacidad</option>
                        <option value="modelo">Modelo</option>
                        <option value="estado">Estado</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RECORRIDOS -->
            <form id="Carros" action="controlador/delete_catacarro.php" method="post">
                <table class="table" id="table-body">
                    <thead class="bg-success">
                        <tr>
                            <th scope="col"><input type="hidden" id="selectAll"></th>
                            <th scope="col">id_carro</th>
                            <th scope="col">modelo</th>
                            <th scope="col" class="text-center">precio_renta</th>
                            <th scope="col">capacidad</th>
                            <th scope="col">estado</th>
                            <th scope="col">img</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        include "modelo/conexion.php";
                        $sql = $conexion->query("SELECT * FROM carros");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_carro ?>"></td>
                                <th scope="row"><?= $datos->id_carro ?></th>
                                <td><?= $datos->modelo ?></td>
                                <td><?= $datos->precio_renta ?></td>
                                <td><?= $datos->capacidad ?></td>
                                <td><?= $datos->estado ?></td>
                                <td>
                                    <img src="<?= $datos->img ?>" alt="Imagen del cliente" style="width: 100px; height: 60px;">
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar_ruta">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
            </form>
        </div>

    </div>

    <?php include "modal_catacarros/add.php"; ?>
    <?php include "modal_catacarros/delete.php"; ?>
    <?php include "modal_catacarros/edit.php"; ?>

    <script>
        // PARA EDITAR
        btnEditar.addEventListener('click', function(event) {
            const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');
            event.preventDefault();

            if (checkedCheckboxes.length === 1) {
                const id = checkedCheckboxes[0].value;
                const row = checkedCheckboxes[0].closest('tr');

                // Obtener los datos de la fila con los índices corregidos

                const modelo = row.cells[2].innerText;
                const precio_renta = row.cells[3].innerText;
                const capacidad = row.cells[4].innerText;
                const estado = row.cells[5].innerText;
                const imagen = row.cells[6].querySelector('img').src;

                // Llenar los campos del modal
                document.getElementById('id_carro_editar').value = id;
                document.getElementById('modelos').value = modelo;
                document.getElementById('precios').value = precio_renta;
                document.getElementById('capacidades').value = capacidad;
                document.getElementById('estados').value = estado;
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
            fetch('controlador/buscar_catacarro.php', {
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

        // JS PARA HACER LA IMAGEN APAREZCA
        function actualizarImg() {
            const $inputfile = document.querySelector("#selImg"),
                $imgcliente = document.querySelector("#image");

            // Establece la imagen por defecto al cargar
            const defaultImg = "IMG/Imagen1.png";
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
        
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>