<?php

require "../modelo/conexion.php";


$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$precio = $conexion->real_escape_string($_POST['precio']);
$duracion_horas = $conexion->real_escape_string($_POST['duracion_horas']);
$ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
$clasificacion = $conexion->real_escape_string($_POST['clasificacion']);

    // Manejo de la carga de la imagen
    $rutaImg = ''; // Inicializamos la variable para la imagen

    if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
        $imagen = $_FILES['selImg'];
        $rutaImg = 'IMG/excursiones/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        // Mover el archivo a la carpeta deseada
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
            $sql = "INSERT INTO excursiones (descripcion, precio, duracion_horas, ubicacion, clasificacion, fecha_creacion, fecha_modificacion,img) 
            VALUES('$descripcion', '$precio', '$duracion_horas', '$ubicacion', '$clasificacion', NOW(), NOW(),'$rutaImg')";
            

        } else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    }else{    
        $sql = "INSERT INTO excursiones (descripcion, precio, duracion_horas, ubicacion, clasificacion, fecha_creacion, fecha_modificacion) 
        VALUES('$descripcion', '$precio', '$duracion_horas', '$ubicacion', '$clasificacion', NOW(), NOW())";
    }

    // Ejecutar la consulta
    if ($conexion->query($sql)) {
        header('Location: ../t_excursiones.php?mensaje=registro_exitoso');
        exit();
    } else{
        echo "Error al insertar los datos: " . $conexion->error;
    }
?>