<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_reservapv_editar']) && !empty($_POST['id_reservapv_editar'])) {
    $id_reservapv_editar = $conexion->real_escape_string($_POST['id_reservapv_editar']); // Escapar el ID

    // Obtener los demás datos
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']); 

            $sql = "UPDATE reservas_pv SET 
                        estado_reserva = '$disponibilidad'
                    WHERE id_reservapv = '$id_reservapv_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../t_reservaspv.php?mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../t_reservaspv.php?mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_reservaspv.php?mensaje=no_id');
    exit();
}
?>
