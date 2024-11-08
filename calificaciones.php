<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calificaciones</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="CSS/hotel.css">
    <script src="https://kit.fontawesome.com/90c11f8b3b.js" crossorigin="anonymous"></script>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
        <div class="row justify-content-end">

        </div>
        <div class=" col-8 p-2">
            <form id="searchFormCalificacion" class="mb-3" method="POST" action="controlador/buscar_calificacion.php">
                <input type="hidden" name="Calificacion" value="Calificacion"> <!-- Campo oculto -->
                <div class="input-group">
                    <select name="campo" class="form-select" required>
                        <option value="id_calificacion">Código</option>
                        <option value="promedio_calificacion">Promedio de Calificacion</option>
                        
                    </select>
                    <input type="text" class="form-control" name="query" placeholder="Buscar...">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>

            <form id="Calificacion" method="post">
                <div class="table-responsive">
                    <table class="table">
                        <thead class="bg-info">
                            <tr>
                                <th scope="col"><input type="hidden" id="selectAll"></th>
                                <th scope="col" class="text-center">id_calificacion</th>
                                <th scope="col" class="text-center">id_cliente</th>
                                <th scope="col" class="text-center">Nombre del Cliente</th>
                                <th scope="col" class="text-center">Apellido Paterno</th>
                                <th scope="col" class="text-center">Apellido Materno</th>
                                <th scope="col" class="text-center">Correo Electronico</th>
                                <th scope="col" class="text-center">promedio_calificacion</th>
                                <th scope="col" class="text-center">comentario</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include "modelo/conexion.php";

                            $sql = $conexion->query("SELECT c.id_cliente, c.nombre, c.apellido_paterno, c.apellido_materno, c.email, cal.id_calificacion, cal.promedio_calificacion, cal.comentario
                         FROM clientes c
                         JOIN calificaciones cal ON c.id_cliente = cal.id_cliente");
                            while ($datos = $sql->fetch_object()) { ?>
                                <tr>
                                    <td><input type="hidden" name="ids[]" value="<?= $datos->id_calificacion ?>"></td>
                                    <th scope="row" class="text-center"><?= $datos->id_calificacion ?></th>
                                    <td class="text-center"><?= $datos->id_cliente ?></td>
                                    <td class="text-center"><?= $datos->nombre ?></td>
                                    <td class="text-center"><?= $datos->apellido_paterno ?></td>
                                    <td class="text-center"><?= $datos->apellido_materno ?></td>
                                    <td class="text-center"><?= $datos->email ?></td>
                                    <td class="text-center"><?= $datos->promedio_calificacion ?></td>
                                    <td class="descripcion text-center"><?= $datos->comentario ?></td>
                                    
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>
        </div>

    </div>


    <script src="JS/t_calificaciones.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>