<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_ruta_editar']) && !empty($_POST['id_ruta_editar'])) {
    $id_ruta_editar = $conexion->real_escape_string($_POST['id_ruta_editar']); // Escapar el ID

    // Obtener los demás datos
    $origen = $conexion->real_escape_string($_POST['origen']);
    $destino = $conexion->real_escape_string($_POST['destino']);
    $distancia = $conexion->real_escape_string($_POST['distancia']);
    $duracion = $conexion->real_escape_string($_POST['duracion']);
    $matricula = $conexion->real_escape_string($_POST['matricula']);

    // Construir la consulta para actualizar el registro
    $sql = "UPDATE rutas SET 
                origen = '$origen', 
                destino = '$destino', 
                distancia = '$distancia', 
                duracion = '$duracion', 
                matricula = '$matricula'
            WHERE id_ruta = '$id_ruta_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=ruta&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=ruta&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=ruta&mensaje=no_id');
    exit();
}
?>
