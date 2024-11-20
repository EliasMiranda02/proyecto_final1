<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_hotel_editar']) && !empty($_POST['id_hotel_editar'])) {
    $id_hotel_editar = $conexion->real_escape_string($_POST['id_hotel_editar']); // Escapar el ID

    // Obtener los demás datos
    $nombre_hotel = $conexion->real_escape_string($_POST['nombre_hotel']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $clave_lada = $conexion->real_escape_string($_POST['clave_lada']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $correo_electronico = $conexion->real_escape_string($_POST['correo_electronico']);
    $numero_habitaciones = $conexion->real_escape_string($_POST['numero_habitaciones']); // Ajustar según el tipo de la columna en la BD
    $descripcion = $conexion->real_escape_string($_POST['descripcion']); 

    $precio_noche = $conexion->real_escape_string($_POST['precio_noche']);
    $precio_noche = preg_replace('/[^0-9.]/', '', $precio_noche);

    $calificacion = $conexion->real_escape_string($_POST['calificacion']);

    if (isset($_FILES['selImgen']) && $_FILES['selImgen']['error'] == 0) {
        $imagen = $_FILES['selImgen'];
        $rutaImg = 'IMG/hoteles/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
            $sql = "UPDATE hoteles SET 
                        nombre_hotel = '$nombre_hotel', 
                        direccion = '$direccion', 
                        clave_lada = '$clave_lada', 
                        telefono = '$telefono', 
                        correo_electronico = '$correo_electronico', 
                        numero_habitaciones = '$numero_habitaciones',
                        descripcion = '$descripcion',
                        precio_noche = '$precio_noche',
                        calificacion = '$calificacion',
                        img = '$rutaImg'
                    WHERE id_hotel = '$id_hotel_editar'";
        }
        else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    } else{
            $sql = "UPDATE hoteles SET 
                        nombre_hotel = '$nombre_hotel', 
                        direccion = '$direccion', 
                        clave_lada = '$clave_lada', 
                        telefono = '$telefono', 
                        correo_electronico = '$correo_electronico', 
                        numero_habitaciones = '$numero_habitaciones',
                        descripcion = '$descripcion',
                        precio_noche = '$precio_noche',
                        calificacion = '$calificacion'
                    WHERE id_hotel = '$id_hotel_editar'";
    }

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=hotel&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=hotel&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=hotel&mensaje=no_id');
    exit();
}
?>
