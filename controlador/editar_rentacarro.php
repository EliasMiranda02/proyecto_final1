<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_rentacarro_editar']) && !empty($_POST['id_rentacarro_editar'])) {
    $id_rentacarro_editar = $conexion->real_escape_string($_POST['id_rentacarro_editar']); // Escapar el ID

    // Obtener los demás datos
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']); 

            $sql = "UPDATE renta_carros SET 
                        estado_renta = '$disponibilidad'
                    WHERE id_renta = '$id_rentacarro_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=rentacarro&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=rentacarro&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=rentacarro&mensaje=no_id');
    exit();
}
?>
