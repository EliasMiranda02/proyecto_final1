<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

if (isset($_POST['ids']) && !empty($_POST['ids'])) {
    $ids = $_POST['ids']; // Obtener los IDs seleccionados
    $validIds = []; // Arreglo para almacenar IDs válidos

    // Verificar que cada ID tenga el formato correcto (U- seguido de seis dígitos)
    foreach ($ids as $id) {
        if (preg_match('/^P-\d{6}$/', $id)) {
            $validIds[] = $conexion->real_escape_string($id); // Escapar el ID y agregarlo al arreglo
        }
    }

    if (!empty($validIds)) {
        // Unir los IDs válidos en una cadena para la consulta
        $idsString = implode("', '", $validIds);

        // Construir la consulta para eliminar múltiples registros
        $sql = "DELETE FROM paquetes WHERE id_paquete IN ('$idsString')"; // Usa IN para eliminar múltiples registros

        if ($conexion->query($sql) === TRUE) {
            // Redirigir con éxito
            header('Location: ../t_paquetes.php?mensaje=eliminado');
            exit();
        } else {
            // Manejar errores
            header('Location: ../t_paquetes.php?mensaje=error&detalle=' . urlencode($conexion->error));
            exit();
        }
    } else {
        // Si no se encontraron IDs válidos
        header('Location: ../t_paquetes.php?mensaje=id_invalido');
        exit();
    }
} else {
    // Si no se enviaron IDs
    header('Location: ../t_paquetes.php?mensaje=no_id');
    exit();
}
?>