<?php
    include "../modelo/conexion.php";

    // Verificar si se recibieron los datos esperados del formulario
    if (isset($_POST['origen'], $_POST['destino'], $_POST['distancia'], $_POST['duracion'], $_POST['matricula'])) {
        $origen = $conexion->real_escape_string($_POST['origen']);
        $destino = $conexion->real_escape_string($_POST['destino']);
        $distancia = $conexion->real_escape_string($_POST['distancia']);
        $duracion = $conexion->real_escape_string($_POST['duracion']);
        $matricula = $conexion->real_escape_string($_POST['matricula']);

        $sql = "INSERT INTO rutas (origen, destino, distancia, duracion, matricula)
                VALUES ('$origen', '$destino', '$distancia', '$duracion', '$matricula')";

        // Ejecutar el query e insertar los datos
        if ($conexion->query($sql) === TRUE) {
            header('Location: ../index.php?i=ruta&mensaje=registro_exitoso');
        } else {
            header('Location: ../index.php?i=ruta&mensaje=error&detalle=' . $conexion->error);
        }
    } else {
        header('Location: ../index.php?i=ruta&mensaje=datos_faltantes');
    }

    $conexion->close();
?>
