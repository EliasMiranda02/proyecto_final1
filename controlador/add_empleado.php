<?php
require "../modelo/conexion.php";



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

    $sql = "INSERT INTO empleados (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo, disponibilidad) 
VALUES('$nombre','$amaterno','$apaterno','$email','$lada','$telefono',NOW(),'$contraseña','$nombre_usuario', '$NIP', '$cargo', '$disponibilidad')";
    ($conexion->query($sql));
    header('Location: ../t_empleado.php');
} else {
    echo "Las contraseñas no coinciden.";
}
