<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="col-12 p-2">
        <form id="Clientes" action="controlador/eliminar_usuario.php" method="post">
            <table class="table">
                <thead class="bg-info">
                    <tr>
                        <th scope="col"><input type="hidden" id="selectAll"></th>
                        <th scope="col">id_usuario</th>
                        <th scope="col">nombre</th>
                        <th scope="col">apellido materno</th>
                        <th scope="col">apellido paterno</th>
                        <th scope="col" class="text-center">email</th>
                        <th scope="col" class="text-center">clave_lada</th>
                        <th scope="col">telefono</th>
                        <th scope="col">fecha_registro</th>
                        <th scope="col">contraseña</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "modelo/conexion.php";

                    $sql = $conexion->query("SELECT * FROM clientes");
                    while ($datos = $sql->fetch_object()) { ?>
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="<?= $datos->id_cliente ?>"></td>
                            <th scope="row"><?= $datos->id_cliente ?></th>
                            <td><?= $datos->nombre ?></td>
                            <td><?= $datos->apellido_materno ?></td>
                            <td><?= $datos->apellido_paterno ?></td>
                            <td><?= $datos->email ?></td>
                            <td class="text-center"><?= $datos->clave_lada ?></td>
                            <td><?= $datos->telefono ?></td>
                            <td><?= $datos->fecha_registro ?></td>
                            <td><?= $datos->contraseña ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#banco" data-id="<?= $datos->id_cliente ?>">Banco</button>
                            </td>


                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
            <button type="button" class="btn btn-warning" id="btnEditar" data-bs-toggle="modal" data-bs-target="#editar">Editar Usuario</button>
        </form>
    </div>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info">
            <?php
            if ($_GET['mensaje'] == 'actualizado') {
                echo "Usuario actualizado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error: " . ($_GET['detalle'] ?? '');
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se seleccionó ningún usuario para editar.";
            }
            ?>
        </div>
    <?php endif; ?>


    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info">
            <?php
            if ($_GET['mensaje'] == 'eliminado') {
                echo "Usuarios eliminados correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error: " . ($_GET['detalle'] ?? '');
            } elseif ($_GET['mensaje'] == 'id_invalido') {
                echo "ID de usuario inválido.";
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se seleccionó ningún usuario para eliminar.";
            }
            ?>
        </div>
    <?php endif; ?>

    <?php include "modal_editar.php"; ?>
    <?php include "modal_usuario.php"; ?>
    <?php include "modal_usuario/D_bancariosU.php" ?>

    <script>
        // ESTE PARA EL BOTON DE EDITAR
        document.addEventListener('DOMContentLoaded', function() {
            const btnEditar = document.getElementById('btnEditar');

            btnEditar.addEventListener('click', function() {
                const checkboxes = document.querySelectorAll('input[name="ids[]"]:checked');
                if (checkboxes.length === 1) {
                    const id = checkboxes[0].value;
                    const row = checkboxes[0].closest('tr');

                    // Obtener los datos de la fila
                    const nombre = row.cells[2].innerText;
                    const apellidoMaterno = row.cells[3].innerText;
                    const apellidoPaterno = row.cells[4].innerText;
                    const email = row.cells[5].innerText;
                    const pass = row.cells[9].innerText; // Suponiendo que la contraseña está en la columna 9
                    const numero = row.cells[7].innerText; // Ajusta el índice según tu tabla

                    // Llenar los campos del modal
                    document.getElementById('id_usuario_editar').value = id;
                    document.getElementById('nombre').value = nombre;
                    document.getElementById('apellido_materno').value = apellidoMaterno;
                    document.getElementById('apellido_paterno').value = apellidoPaterno;
                    document.getElementById('email').value = email;
                    document.getElementById('pass').value = pass;
                    document.getElementById('numero').value = numero;
                } else {
                    alert('Por favor, selecciona un único registro para editar.');
                    $('#editar').modal('hide'); // Ocultar el modal si no hay un único registro seleccionado
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

        // DATOS BANCARIOS 
        document.addEventListener('DOMContentLoaded', function() {
            const buttonsBanco = document.querySelectorAll('button[data-bs-target="#banco"]');

            buttonsBanco.forEach(button => {
                button.addEventListener('click', function() {
                    const row = this.closest('tr');
                    const id_cliente = row.querySelector('input[name="ids[]"]').value;
                    const idClienteDisplay = document.getElementById('idClienteDisplay');
                    idClienteDisplay.innerHTML = 'ID Cliente: ' + id_cliente;

                    fetch(`controlador/datos_bancario.php?id_cliente=${id_cliente}`)
                        .then(response => response.json())
                        .then(data => {
                            const datosBancarios = document.getElementById('datosBancarios');
                            datosBancarios.innerHTML = '';

                            if (data.length > 0) {
                                data.forEach(dato => {
                                    datosBancarios.innerHTML += `
                                <p><strong>ID Tarjeta:</strong> ${dato.id_tarjeta}</p>
                                <p><strong>Número de Cuenta:</strong> ${dato.numero_cuenta}</p>
                                <p><strong>Fecha de Vencimiento:</strong> ${dato.fecha_vencimiento}</p>
                                <p><strong>Nombre Titular:</strong> ${dato.nombre_titular}</p>
                                <p><strong>Código de Seguridad:</strong> ${dato.codigo_seguridad}</p>
                                <p><strong>Nombre Banco:</strong> ${dato.nombre_banco}</p>
                                <hr>
                            `;
                                });
                            } else {
                                datosBancarios.innerHTML = '<p>No se encontraron datos bancarios para este cliente.</p>';
                            }
                        })
                        .catch(error => {
                            console.error('Error al obtener los datos bancarios:', error);
                        });
                });
            });
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>