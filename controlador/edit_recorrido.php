<?php
include "../modelo/conexion.php";

// Debugging
var_dump($_POST); // Ver qué datos se están recibiendo

// Verificar si se ha recibido el ID del recorrido
if (isset($_POST['id_recorrido_editar']) && !empty($_POST['id_recorrido_editar'])) {
    $id_recorrido_editar = $conexion->real_escape_string($_POST['id_recorrido_editar']);

    // Obtener los demás datos y formatearlos correctamente
    $fecha_salida = date('Y-m-d H:i:s', strtotime($_POST['date_salida']));
    $fecha_llegada = date('Y-m-d H:i:s', strtotime($_POST['date_llegada']));
    $precio_boleto = $conexion->real_escape_string($_POST['boleto']);
    $estado = $conexion->real_escape_string($_POST['estado']);

    // Construir la consulta para actualizar el registro
    $sql = "UPDATE recorridos SET 
            fecha_salida = '$fecha_salida', 
            fecha_llegada = '$fecha_llegada', 
            precio_boleto = '$precio_boleto', 
            estado = '$estado'
        WHERE id_recorrido = '$id_recorrido_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página con un mensaje de éxito
        header('Location: ../t_recorridos.php?mensaje=actualizado');
        exit();
    } else {
        die("Error al actualizar: " . $conexion->error);
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_recorridos.php?mensaje=no_id');
    exit();
}
?>
