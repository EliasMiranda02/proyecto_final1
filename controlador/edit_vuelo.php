<?php
include "../modelo/conexion.php";

// Debugging
var_dump($_POST); // Ver qué datos se están recibiendo

// Verificar si se ha recibido el ID del vuelo
if (isset($_POST['id_vuelo_editar']) && !empty($_POST['id_vuelo_editar'])) {
    $id_vuelo_editar = $conexion->real_escape_string($_POST['id_vuelo_editar']);

    // Obtener los demás datos y formatearlos correctamente
    $no_vuelo = $conexion->real_escape_string($_POST['no_vuelo']);
    $origen = $conexion->real_escape_string($_POST['origen']);
    $destino = $conexion->real_escape_string($_POST['destino']);
    $fecha_salida = date('Y-m-d H:i:s', strtotime($_POST['date_salida']));
    $fecha_llegada = date('Y-m-d H:i:s', strtotime($_POST['date_llegada']));

    $precio = $conexion->real_escape_string($_POST['precio']); // Corregido
    $precio = preg_replace('/[^0-9.]/', '', $precio);

    // Construir la consulta para actualizar el registro
    $sql = "UPDATE vuelos SET 
            numero_vuelo = '$no_vuelo', 
            origen = '$origen', 
            destino = '$destino', 
            fecha_salida = '$fecha_salida',
            fecha_llegada = '$fecha_llegada',
            precio_vuelo = '$precio'
        WHERE id_vuelo = '$id_vuelo_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir a la página con un mensaje de éxito
        header('Location: ../index.php?i=volante&mensaje=actualizado');
        exit();
    } else {
        die("Error al actualizar: " . $conexion->error);
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=volante&mensaje=no_id');
    exit();
}
?>
