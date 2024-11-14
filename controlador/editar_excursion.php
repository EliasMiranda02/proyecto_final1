<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_excursion_editar']) && !empty($_POST['id_excursion_editar'])) {
    $id_excursion_editar = $conexion->real_escape_string($_POST['id_excursion_editar']); // Escapar el ID

    // Obtener los demás datos
    
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);

    $precio = $conexion->real_escape_string($_POST['precio']);
    $precio = preg_replace('/[^0-9.]/', '', $precio);

    $duracion_horas = $conexion->real_escape_string($_POST['duracion_horas']);
    $ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
    $clasificacion = $conexion->real_escape_string($_POST['clasificacion']); // Ajustar según el tipo de la columna en la BD
    
    
    if (isset($_FILES['sellImg']) && $_FILES['sellImg']['error'] == 0) {
        $imagen = $_FILES['sellImg'];
        $rutaImg = 'IMG/excursiones/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
                // Construir la consulta para actualizar el registro
                $sql = "UPDATE excursiones SET 
                    descripcion = '$descripcion', 
                    precio = '$precio', 
                    duracion_horas = '$duracion_horas', 
                    ubicacion = '$ubicacion', 
                    clasificacion = '$clasificacion',
                    fecha_modificacion = NOW(),
                    img = '$rutaImg'
                WHERE id_excursion = '$id_excursion_editar'";
    }
    else {
        echo "Error al mover la imagen a la carpeta.";
        exit();
    }
    } else{
        // Construir la consulta para actualizar el registro
        $sql = "UPDATE excursiones SET 
                    descripcion = '$descripcion', 
                    precio = '$precio', 
                    duracion_horas = '$duracion_horas', 
                    ubicacion = '$ubicacion', 
                    clasificacion = '$clasificacion',
                    fecha_modificacion = NOW()
                WHERE id_excursion = '$id_excursion_editar'";
    }
    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../t_excursiones.php?mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../t_excursiones.php?mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_excursiones.php?mensaje=no_id');
    exit();
}
?>
