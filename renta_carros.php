<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Renta de Carros</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="col-8 p-2">

            <!-- BUSACDOR DE LAS RECORRIDOS -->
            <form id="searchFormAsesor" class="mb-3" method="POST" action="controlador/buscar_Rcarro.php">
                <input type="hidden" name="cargo" value="Asesor de Viajes"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select">
                        <option value="id_renta">id_renta</option>
                        <option value="id_carro">id_carro</option>
                        <option value="id_cliente">id_cliente</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <!-- TABLA DE RECORRIDOS -->

            <table class="table" id="table-body">
                <thead>
                    <tr>
                        <th scope="col">id_renta</th>
                        <th scope="col">id_carro</th>
                        <th scope="col">id_cliente</th>
                        <th scope="col">fecha_renta</th>
                        <th scope="col">fecha_devolucion</th>
                        <th scope="col" class="text-center">estado_renta</th>
                        <th scope="col" class="text-center">dias_rentados</th>
                    </tr>
                </thead>
                <tbody class="">
                    <?php
                    include "modelo/conexion.php";
                    $sql = $conexion->query("SELECT * FROM renta_carros");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <th scope="row"><?= $datos->id_renta ?></th>
                            <th><?= $datos->id_carro ?></th>
                            <td><?= $datos->id_cliente ?></td>
                            <td><?= $datos->fecha_renta ?></td>
                            <td><?= $datos->fecha_devolucion ?></td>
                            <td><?= $datos->estado_renta ?></td>
                            <td><?= $datos->dias_rentados ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>


        </div>

    </div>

    <script>
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
            fetch('controlador/buscar_Rcarro.php', {
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