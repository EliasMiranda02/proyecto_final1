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
        <form id="deleteForm" action="controlador/eliminar_usuario.php" method="post">
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
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#eliminar">Eliminar seleccionados</button>
        </form>
    </div>

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


    <?php include "modal_usuario.php"; ?>

    <script>
        document.getElementById('selectAll').addEventListener('change', function() {
            let checkboxes = document.querySelectorAll('input[name="ids[]"]');
            checkboxes.forEach(checkbox => checkbox.checked = this.checked);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>