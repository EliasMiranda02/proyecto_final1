<?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
    include "../modelo/conexion.php";

    $numeros = $conexion->real_escape_string($_POST['numero']);
    $nombre = $conexion->real_escape_string($_POST['nombres']);
    $descripcion = $conexion->real_escape_string($_POST['descripcion']);
    $precio_aproximado = $conexion->real_escape_string($_POST['precios']);
    $duracion_horas = $conexion->real_escape_string($_POST['duracion']);
    $destino = $conexion->real_escape_string($_POST['destino']); 

    // Manejo de la carga de la imagen
    $rutaImg = ''; // Inicializamos la variable para la imagen

    if (isset($_FILES['sellImg']) && $_FILES['sellImg']['error'] == 0) {
        $imagen = $_FILES['sellImg'];
        $rutaImg = 'IMG/paquetes/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen

        // Mover el archivo a la carpeta deseada
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {

            $sql = "INSERT INTO paquetes (numero_paquete,nombre,descripcion,precio_aproximado,duracion_dias,destino,fecha_creacion,fecha_modificacion,img) 
            VALUES ('$numeros','$nombre','$descripcion','$precio_aproximado','$duracion_horas','$destino',NOW(),NOW(),'$rutaImg')";
        
        } else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    }else{
        $sql = "INSERT INTO paquetes (numero_paquete,nombre,descripcion,precio_aproximado,duracion_dias,destino,fecha_creacion,fecha_modificacion) 
        VALUES ('$numeros','$nombre','$descripcion','$precio_aproximado','$duracion_horas','$destino',NOW(),NOW())";
    
    }

    // Ejecutar la consulta
    if ($conexion->query($sql)) {
        header('Location: ../t_paquetes.php?mensaje=registro_exitoso');
        exit();
    } else {
        echo "Error al insertar los datos: " . $conexion->error;
    }


?>