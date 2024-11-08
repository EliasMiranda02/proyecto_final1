<?php
require "../modelo/conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Verificar que las contraseñas coinciden
if ($_POST["contraseña1"] === $_POST["contraseña2"]) {
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $amaterno = $conexion->real_escape_string($_POST['amaterno']);
    $apaterno = $conexion->real_escape_string($_POST['apaterno']);
    $email = $conexion->real_escape_string($_POST['email']);
    $contraseña = $conexion->real_escape_string($_POST['contraseña1']);
    $lada = $conexion->real_escape_string($_POST['opcion']);
    $telefono = $conexion->real_escape_string($_POST['numero']);
    $nombre_usuario = $conexion->real_escape_string($_POST['nombre_usuario']);
    $NIP = $conexion->real_escape_string($_POST['nip']);
    $cargo = $conexion->real_escape_string($_POST['cargo']);
    $disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']);

    // Manejo de la carga de la imagen
$rutaImg = ''; // Inicializamos la variable para la imagen

if (isset($_FILES['sellImg']) && $_FILES['sellImg']['error'] == 0) {
    $imagen = $_FILES['sellImg'];
    $rutaImg = 'IMG/empleado/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen

    // Mover el archivo a la carpeta deseada
    if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
        $sql = "INSERT INTO empleados (nombre, apellido_paterno, apellido_materno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo, disponibilidad, img) 
        VALUES('$nombre','$apaterno','$amaterno','$email','$lada','$telefono',NOW(),'$contraseña','$nombre_usuario', '$NIP', '$cargo', '$disponibilidad', '$rutaImg')";
    } else {
        echo "Error al mover la imagen a la carpeta.";
        exit();
    }
} else {
    // Si no se seleccionó una imagen, se inserta con un valor vacío para la columna img
    $sql = "INSERT INTO empleados (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo, disponibilidad, img) 
    VALUES('$nombre','$amaterno','$apaterno','$email','$lada','$telefono',NOW(),'$contraseña','$nombre_usuario', '$NIP', '$cargo', '$disponibilidad', '')";
}

    ($conexion->query($sql));
    header('Location: ../t_empleado.php?mensaje=registro_exitoso');
} else {
    echo "Las contraseñas no coinciden.";
}
?>