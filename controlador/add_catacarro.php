<?php

include "../modelo/conexion.php";

// Obtener los valores del formulario
$modelo = $conexion->real_escape_string($_POST['modelo']);

$precio = $conexion->real_escape_string($_POST['precio']);
$precio = preg_replace('/[^0-9.]/', '', $precio);


$capacidad = $conexion->real_escape_string($_POST['capacidad']);
$estado = $conexion->real_escape_string($_POST['estado']);

// Manejo de la carga de la imagen
$rutaImg = ''; // Inicializamos la variable para la imagen

if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
    $imagen = $_FILES['selImg'];
    $rutaImg = 'IMG/rodante/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen

    // Mover el archivo a la carpeta deseada
    if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
        // Si la imagen se movió correctamente, insertar los datos en la base de datos
        $sql = "INSERT INTO carros (modelo, precio_renta, capacidad, estado, img) 
                VALUES ('$modelo', '$precio', '$capacidad', '$estado', '$rutaImg')";
    } else {
        echo "Error al mover la imagen a la carpeta.";
        exit();
    }
} else {
    // Si no se seleccionó una imagen, se inserta sin la columna de imagen
    $sql = "INSERT INTO carros (modelo, precio_renta, capacidad, estado) 
            VALUES ('$modelo', '$precio', '$capacidad', '$estado')";
}

// Ejecutar la consulta
if ($conexion->query($sql)) {
    $_SESSION['mensaje'] = "Registro exitoso!";
    header('Location: ../index.php?i=catacarro&mensaje=registro_exitoso');
    exit();
} else {
    echo "Error al insertar los datos: " . $conexion->error;
}

?>
