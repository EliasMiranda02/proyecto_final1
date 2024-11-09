<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="franja"></div>
    <div class="paquetes">
        <div class="imagen">
            <img src="IMG/registro/Logo.png" alt="">
        </div>

        <div class="logo">
            <h4>REGISTRO DE USUARIOS</h4>
        </div>

    </div>

    <div class="d-flex justify-content-center align-items-center">
        <div class=" col-10 p-2">

            <?php if (isset($_GET['mensaje'])): ?>
                <div class="alert alert-info" id="mensajeAlerta">
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
            <form id="searchFormUsuario" class="mb-3" method="POST" action="controlador/buscar_usuario.php">
                <input type="hidden" name="Usuario" value="Usuario"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="nombre">Nombre</option>
                        <option value="apellido_paterno">Apellido</option>
                        <option value="email">Corrreo Electrónico</option>
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn botones">Buscar</button>
                </div>
            </form>

            <form id="Clientes" action="controlador/eliminar_usuario.php" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col" class="encabezado"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center encabezado">id_usuario</th>
                                <th scope="col" class="text-center encabezado">nombre</th>
                                <th scope="col" class="text-center encabezado">apellido paterno</th>
                                <th scope="col" class="text-center encabezado">apellido materno</th>
                                <th scope="col" class="text-center encabezado">email</th>
                                <th scope="col" class="text-center encabezado">clave_lada</th>
                                <th scope="col" class="text-center encabezado">telefono</th>
                                <th scope="col" class="text-center encabezado">fecha_registro</th>
                                <th scope="col" class="text-center encabezado">contraseña</th>
                                <th scope="col" class="text-center encabezado">Imagen</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT * FROM clientes");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="checkbox" name="ids[]" value="<?= $datos->id_cliente ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_cliente ?></th>
                                    <td class="text-center"><?= $datos->nombre ?></td>
                                    <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                    <td class="text-center"><?= $datos->apellido_materno ?></td>
                                    <td class="text-center"><?= $datos->email ?></td>
                                    <td class="text-center"><?= $datos->clave_lada ?></td>
                                    <td class="text-center"><?= $datos->telefono ?></td>
                                    <td class="text-center"><?= $datos->fecha_registro ?></td>
                                    <td class="text-center"><?= $datos->contraseña ?></td>
                                    <td class="text-center">
                                        <img src="<?= $datos->img ?>" alt="Imagen del cliente" style="width: 100px; height: 60px;">
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn botones" data-bs-toggle="modal" data-bs-target="#banco" data-id="<?= $datos->id_cliente ?>">Banco</button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
            </form>
        </div>

    </div>

    <?php include "modal_usuario.php"; ?>
    <?php include "modal_usuario/D_bancariosU.php" ?>

    <script>
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

        // Oculta el mensaje después de 5 segundos
        setTimeout(function() {
            const mensajeAlerta = document.getElementById('mensajeAlerta');
            if (mensajeAlerta) {
                mensajeAlerta.style.display = 'none';
            }
        }, 2000); // 5000 milisegundos = 5 segundos

        document.getElementById('searchFormUsuario').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const queryValue = formData.get('query').trim(); // Obtener el valor de 'query' y quitar espacios

            if (queryValue === "") {
                // Si está vacío, usar un valor especial para indicar "todos los registros"
                formData.set('query', '%'); // Esto actuará como un comodín en SQL para traer todos los registros
            }
            fetch('controlador/buscar_usuario.php', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.text())
                .then(data => {
                    const tbody = document.querySelector('#Clientes table tbody'); // Especifica el tbody correcto
                    tbody.innerHTML = data;
                })
                .catch(error => console.error('Error:', error));
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>