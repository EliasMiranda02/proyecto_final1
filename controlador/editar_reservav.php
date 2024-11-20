<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_reservav_editar']) && !empty($_POST['id_reservav_editar'])) {
    $id_reservav_editar = $conexion->real_escape_string($_POST['id_reservav_editar']); // Escapar el ID

    // Obtener los demás datos
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']); 

            $sql = "UPDATE reservas_v SET 
                        estado = '$disponibilidad'
                    WHERE id_reservav = '$id_reservav_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=reservav&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=reservav&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=reservav&mensaje=no_id');
    exit();
}
?>
