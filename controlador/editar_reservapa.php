<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_reservapa_editar']) && !empty($_POST['id_reservapa_editar'])) {
    $id_reservapa_editar = $conexion->real_escape_string($_POST['id_reservapa_editar']); // Escapar el ID

    // Obtener los demás datos
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']); 

            $sql = "UPDATE reservas_pa SET 
                        estado_reserva = '$disponibilidad'
                    WHERE id_reservapa = '$id_reservapa_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=reservapa&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=reservapa&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=reservapa&mensaje=no_id');
    exit();
}
?>
