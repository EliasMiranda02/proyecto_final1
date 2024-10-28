<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catalogo de Hoteles</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class=" col-8 p-2">

            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info" id="mensajeAlerta">
                    <?php
                    if ($_GET['mensaje'] == 'actualizado') {
                        echo "Hotel actualizado correctamente.";
                    } elseif ($_GET['mensaje'] == 'error') {
                        echo "Hubo un error: " . ($_GET['detalle'] ?? '');
                    } elseif ($_GET['mensaje'] == 'no_id') {
                        echo "No se seleccionó ningún hotel para editar.";
                    } elseif ($_GET['mensaje'] == 'eliminado') {
                        echo "Hoteles eliminados correctamente.";
                    } elseif ($_GET['mensaje'] == 'id_invalido') {
                        echo "ID de Hotel inválido.";
                    }
                    ?>
                </div>
            <?php endif; ?>

            <form id="Hoteles" action="controlador/eliminar_hotel.php" method="post">
                <table class="table">
                    <thead class="bg-info">
                        <tr>
                            <th scope="col"><input type="hidden" id="selectAll"></th>
                            <th scope="col">id_hotel</th>
                            <th scope="col">nombre del hotel</th>
                            <th scope="col">direccion</th>
                            <th scope="col">clave lada</th>
                            <th scope="col">telefono</th>
                            <th scope="col">correo electronico</th>
                            <th scope="col">numero habitaciones</th>
                            <th scope="col">descripcion</th>
                            <th scope="col">precio por noche</th>
                            <th scope="col">calificacion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include "modelo/conexion.php";

                        $sql = $conexion->query("SELECT * FROM hoteles");
                        while ($datos = $sql->fetch_object()) { ?>
                            <tr>
                                <td><input type="checkbox" name="ids[]" value="<?= $datos->id_hotel ?>"></td>
                                <th scope="row"><?= $datos->id_hotel ?></th>
                                <td><?= $datos->nombre_hotel ?></td>
                                <td><?= $datos->direccion ?></td>
                                <td><?= $datos->clave_lada ?></td>
                                <td><?= $datos->telefono ?></td>
                                <td><?= $datos->correo_electronico ?></td>
                                <td><?= $datos->numero_habitaciones ?></td>
                                <td><?= $datos->descripcion ?></td>
                                <td><?= $datos->precio_noche ?></td>
                                <td><?= $datos->calificacion ?></td>


                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
                <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Hotel</button>
            </form>
        </div>

    </div>

    <?php include "modal_hotel/modal_editar.php"; ?>
    <?php include "modal_hotel/modal_eliminar.php"; ?>
    
    <script>
        // ESTE PARA EL BOTON DE EDITAR
        document.addEventListener('DOMContentLoaded', function() {
            const btnEditar = document.getElementById('btnEditar');
            const checkboxes = document.querySelectorAll('input[name="ids[]"]');

            // Deshabilitar el botón al cargar la página
            btnEditar.disabled = true;

            // Añadir un event listener a cada checkbox
            checkboxes.forEach(checkbox => {
                checkbox.addEventListener('change', function() {
                    // Obtener el número de checkboxes seleccionados
                    const checkedCount = Array.from(checkboxes).filter(checkbox => checkbox.checked).length;

                    // Habilitar el botón solo si hay exactamente un checkbox seleccionado
                    btnEditar.disabled = checkedCount !== 1;
                });
            });

            btnEditar.addEventListener('click', function(event) {
                const checkedCheckboxes = document.querySelectorAll('input[name="ids[]"]:checked');

                // Prevenir el comportamiento por defecto del botón
                event.preventDefault();

                // Comprobar si hay exactamente un checkbox seleccionado
                if (checkedCheckboxes.length === 1) {
                    const id = checkedCheckboxes[0].value;
                    const row = checkedCheckboxes[0].closest('tr');

                    // Obtener los datos de la fila
                    const nombre_hotel = row.cells[2].innerText;
                    const direccion = row.cells[3].innerText;
                    const clave_lada = row.cells[4].innerText;
                    const telefono = row.cells[5].innerText;
                    const correo_electronico = row.cells[6].innerText; // Suponiendo que la contraseña está en la columna 9
                    const numero_habitaciones = row.cells[7].innerText; // Ajusta el índice según tu tabla
                    const descripcion = row.cells[8].innerText;
                    const precio_noche = row.cells[9].innerText; 
                    const calificacion = row.cells[10].innerText;

                    // Llenar los campos del modal
                    document.getElementById('id_hotel_editar').value = id;
                    document.getElementById('nombre_hotel').value = nombre_hotel;
                    document.getElementById('direccion').value = direccion;
                    document.getElementById('clave_lada').value = clave_lada;
                    document.getElementById('telefono').value = telefono;
                    document.getElementById('correo_electronico').value = correo_electronico;
                    document.getElementById('numero_habitaciones').value = numero_habitaciones;
                    document.getElementById('descripcion').value = descripcion;
                    document.getElementById('precio_noche').value = precio_noche;
                    document.getElementById('calificacion').value = calificacion;

                    // Abrir el modal
                    $('#editar').modal('show');
                } else {
                    // Solo mostrar la alerta, sin abrir el modal
                    alert('Por favor, selecciona un único registro para editar.');
                }
            });

            // Enviar el formulario al hacer clic en "Guardar Cambios"
            document.getElementById('confirmarEditar').addEventListener('click', function() {
                document.getElementById('editarForm').submit(); // Envía el formulario para actualizar el registro
            });
        });

        // Para eliminar
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });

        // Oculta el mensaje después de 5 segundos
        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 2000); // 5000 milisegundos = 5 segundos
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>