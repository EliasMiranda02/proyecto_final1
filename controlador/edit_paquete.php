<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_paquete_editar']) && !empty($_POST['id_paquete_editar'])) {
    $id_paquete_editar = $conexion->real_escape_string($_POST['id_paquete_editar']); // Escapar el ID

    // Obtener los demás datos
    
    $nombre = $conexion->real_escape_string($_POST['nombres']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $precio_aproximado = $conexion->real_escape_string($_POST['precios']);
    $duracion_horas = $conexion->real_escape_string($_POST['duracion']);
    $destino = $conexion->real_escape_string($_POST['destino']); 

    if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
        $imagen = $_FILES['selImg'];
        $rutaImg = 'IMG/paquetes/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
            // Construir la consulta para actualizar el registro
            $sql = "UPDATE paquetes SET 
                        nombre = '$nombre', 
                        descripcion = '$descripcion', 
                        precio_aproximado = '$precio_aproximado', 
                        duracion_dias = '$duracion_horas', 
                        destino = '$destino',
                        fecha_modificacion = NOW(),
                        img = '$rutaImg'
                    WHERE id_paquete = '$id_paquete_editar'";
        }
        else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    } else{

        $sql = "UPDATE paquetes SET 
            nombre = '$nombre', 
            descripcion = '$descripcion', 
            precio_aproximado = '$precio_aproximado', 
            duracion_dias = '$duracion_horas', 
            destino = '$destino',
            fecha_modificacion = NOW()
            WHERE id_paquete = '$id_paquete_editar'";

    }
    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../t_paquetes.php?mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../t_paquetes.php?mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_paquetes.php?mensaje=no_id');
    exit();
}
?>
