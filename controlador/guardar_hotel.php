<?php

    require "../modelo/conexion.php";

    $nombre_hotel = $conexion->real_escape_string($_POST['nombre_hotel']);
    $direccion = $conexion->real_escape_string($_POST['direccion']);
    $clave_lada = $conexion->real_escape_string($_POST['clave_lada']);
    $telefono = $conexion->real_escape_string($_POST['telefono']);
    $correo_electronico = $conexion->real_escape_string($_POST['correo_electronico']);
    $numero_habitaciones = $conexion->real_escape_string($_POST['numero_habitaciones']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);

    $precio_noche = $conexion->real_escape_string($_POST['precio_noche']);
    $precio_noche = preg_replace('/[^0-9.]/', '', $precio_noche);

    $calificacion = $conexion->real_escape_string($_POST['calificacion']);


    // Manejo de la carga de la imagen
    $rutaImg = ''; // Inicializamos la variable para la imagen

    if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
        $imagen = $_FILES['selImg'];
        $rutaImg = 'IMG/hoteles/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen

        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
            $sql = "INSERT INTO hoteles (nombre_hotel, direccion, clave_lada, telefono, correo_electronico, numero_habitaciones, descripcion, precio_noche, calificacion,img) 
    VALUES('$nombre_hotel','$direccion','$clave_lada','$telefono','$correo_electronico','$numero_habitaciones','$descripcion','$precio_noche','$calificacion','$rutaImg')";
        } else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    } else {
        $sql = "INSERT INTO hoteles (nombre_hotel, direccion, clave_lada, telefono, correo_electronico, numero_habitaciones, descripcion, precio_noche, calificacion) 
    VALUES('$nombre_hotel','$direccion','$clave_lada','$telefono','$correo_electronico','$numero_habitaciones','$descripcion','$precio_noche','$calificacion')";
    }

    if ($conexion->query($sql)) {
        header('Location: ../t_hoteles.php?mensaje=registro_exitoso');
        exit();
    } else {
        echo "Error al insertar los datos: " . $conexion->error;
    }
?>