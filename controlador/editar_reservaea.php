<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_reservaea_editar']) && !empty($_POST['id_reservaea_editar'])) {
    $id_reservaea_editar = $conexion->real_escape_string($_POST['id_reservaea_editar']); // Escapar el ID

    // Obtener los demás datos
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']); 

            $sql = "UPDATE reservas_ea SET 
                        estado_reserva = '$disponibilidad'
                    WHERE id_reservaea = '$id_reservaea_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=reservaea&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=reservaea&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=reservaea&mensaje=no_id');
    exit();
}
?>
