<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/hotel.css">
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/registro/Logo.png" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE CATÁLOGOS DE CARROS</h4>
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
                    <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#agregar">
                        <i class="fa-solid fa-plus"></i> Agregar Carro
                    </button>
                </div>

                <div class="search">
                    <!-- BUSACDOR DE LAS RECORRIDOS -->
                    <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_catacarro.php">
                        <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                        <div class="input-group">
                            <select name="campo" class="form-select">
                                <option value="modelo">Modelo</option>
                                <option value="estado">Estado</option>
                            </select>
                            <input type="text" class="form-control" name="query" placeholder="Buscar...">
                            <button type="submit" class="btn botones">Buscar</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABLA DE RECORRIDOS -->
            <form id="Carros" action="controlador/delete_catacarro.php" method="post">
                <div class="table-responsive">
                    <table class="table" id="table-body">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="p-3 encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">Código</th>
                                <th scope="col" class="text-center encabezado">Modelo</th>
                                <th scope="col" class="text-center encabezado">Precio de Renta</th>
                                <th scope="col" class="text-center encabezado">Capacidad</th>
                                <th scope="col" class="text-center encabezado">Estado</th>
                                <th scope="col" class="text-center encabezado">Foto</th>
                            </tr>
                        </thead>
                        <tbody class="">
                            <?php
                            include "modelo/conexion.php";
                            $sql = $conexion->query("SELECT * FROM carros");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_carro ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_carro ?></th>
                                    <td class="text-center"><?= $datos->modelo ?></td>
                                    <td class="text-center"><?= "$" . number_format($datos->precio_renta,2)?></td>
                                    <td class="text-center"><?= $datos->capacidad ?></td>
                                    <td class="text-center"><?= $datos->estado ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen del Carro" style="width: 100px; height: 60px;">
                                    </td>
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
                </div>
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
                const precio_renta = row.cells[3].innerText.replace('$', '').trim();
                const capacidad = row.cells[4].innerText;
                const estado = row.cells[5].innerText;
                const imagen = row.cells[6].querySelector('img').src;

                // Llenar los campos del modal
                document.getElementById('id_carro_editar').value = id;
                document.getElementById('modelos').value = modelo;
                document.getElementById('precios').value = formatMoneda(precio_renta);
                document.getElementById('capacidades').value = capacidad;
                document.getElementById('Sestados').value = estado;
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

        // PARA HACER CAMBIO DE IMAGEN EN EL MODAL DE EDITAR
        function actualizarImg1() {
            const $inputfile = document.querySelector("#sellImg"),
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
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>