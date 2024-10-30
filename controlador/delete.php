<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

if (isset($_POST['ids']) && !empty($_POST['ids'])) {
    $ids = $_POST['ids']; // Obtener los IDs seleccionados
    $validIds = []; // Arreglo para almacenar IDs válidos

    // Verificar que cada ID tenga el formato correcto (R- seguido de seis dígitos)
    foreach ($ids as $id) {
        if (preg_match('/^RU-\d{6}$/', $id)) {
            $validIds[] = $conexion->real_escape_string($id); // Escapar el ID y agregarlo al arreglo
        }
    }

    if (!empty($validIds)) {
        // Unir los IDs válidos en una cadena para la consulta
        $idsString = implode("', '", $validIds);

        // Construir la consulta para eliminar múltiples registros
        $sql = "DELETE FROM rutas WHERE id_ruta IN ('$idsString')"; // Usa IN para eliminar múltiples registros

        if ($conexion->query($sql) === TRUE) {
            // Redirigir con éxito
            header('Location: ../rutas.php');
            echo "<div>HOLA</div>";
            exit();
        } else {
            // Manejar errores
            header('Location: ../rutas.php?mensaje=error&detalle=' . urlencode($conexion->error));
            exit();
        }
    } else {
        // Si no se encontraron IDs válidos
        header('Location: ../rutas.php?mensaje=id_invalido');
        exit();
    }
} else {
    // Si no se enviaron IDs
    header('Location: ../rutas.php?mensaje=no_id');
    exit();
}
?>
