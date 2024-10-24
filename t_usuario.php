<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <!-- TABLA DE USUARIOS -->
    <div class="col-12 p-2">
        <table class="table">
            <thead class="Bg-info">
                <tr>
                    <th scope="col">id_usuario</th>
                    <th scope="col">nombre</th>
                    <th scope="col">apellido materno</th>
                    <th scope="col">apellido paterno</th>
                    <th scope="col" class="px-3 text-center">email</th>
                    <th scope="col" class="text-center">clave_lada</th>
                    <th scope="col">telefono</th>
                    <th scope="col">fecha_registro</th>
                    <th scope="col">contraseña</th>
                    <th scope="col">Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include "modelo/conexion.php";

                $sql = $conexion->query("SELECT * FROM clientes");
                while ($datos = $sql->fetch_object()) { ?>
                    <tr>
                        <th scope="row"><?= $datos->id_cliente ?></th>
                        <td><?= $datos->nombre ?></td>
                        <td><?= $datos->apellido_materno ?></td>
                        <td><?= $datos->apellido_paterno ?></td>
                        <td><?= $datos->email ?></td>
                        <td><?= $datos->clave_lada ?></td>
                        <td><?= $datos->telefono ?></td>
                        <td><?= $datos->fecha_registro ?></td>
                        <td><?= $datos->contraseña ?></td>
                        <td>
                            <!-- Botón de eliminación que abre el modal -->
                            <a href="#" class="btn btn-small btn-danger" data-bs-toggle="modal" data-bs-target="#eliminar" data-bs-id="<?= $datos->id_cliente ?>">
                                <i class="fa-solid fa-trash"></i>
                            </a>

                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

    </div>
    <?php if (isset($_GET['mensaje'])): ?>
        <div class="alert alert-info">
            <?php
            if ($_GET['mensaje'] == 'eliminado') {
                echo "Usuario eliminado correctamente.";
            } elseif ($_GET['mensaje'] == 'error') {
                echo "Hubo un error al intentar eliminar el usuario.";
            } elseif ($_GET['mensaje'] == 'id_invalido') {
                echo "ID de usuario inválido.";
            } elseif ($_GET['mensaje'] == 'no_id') {
                echo "No se proporcionó el ID de usuario.";
            }
            ?>
        </div>
    <?php endif; ?>


    <?php include "modal_usuario.php"; ?>

    <script>
        let eliminar = document.getElementById('eliminar')

        eliminar.addEventListener('show.bs.modal', function(event) {
            let button = event.relatedTarget // Botón que activó el modal
            let id_cliente = button.getAttribute('data-bs-id') // Extraer el id_cliente del atributo data-bs-id
            let inputId = eliminar.querySelector('.modal-footer #id') // Seleccionar el input oculto
            inputId.value = id_cliente // Asignar el valor al input
        })
    </script>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>