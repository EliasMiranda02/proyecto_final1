<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_carro_editar']) && !empty($_POST['id_carro_editar'])) {
    $id_carro_editar = $conexion->real_escape_string($_POST['id_carro_editar']); // Escapar el ID

    // Obtener los demás datos
    
    $modelo = $conexion->real_escape_string($_POST['modelos']);
    $precio = $conexion->real_escape_string($_POST['precios']); // Ajustar según el tipo de la columna en la BD
    $capacidad = $conexion->real_escape_string($_POST['capacidades']);
    $estado = $conexion->real_escape_string($_POST['estado']);
    // Construir la consulta para actualizar el registro
    $sql = "UPDATE carros SET 
                modelo = '$modelo', 
                precio_renta = '$precio',
                capacidad = '$capacidad',
                estado = '$estado'
            WHERE id_carro = '$id_carro_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../t_catacarros.php?mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../t_catacarros.php?mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_catacarros.php?mensaje=no_id');
    exit();
}
?>
