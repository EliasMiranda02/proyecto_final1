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
$calificacion = $conexion->real_escape_string($_POST['calificacion']);

$sql = "INSERT INTO hoteles (nombre_hotel, direccion, clave_lada, telefono, correo_electronico, numero_habitaciones, descripcion, precio_noche, calificacion) 
VALUES('$nombre_hotel','$direccion','$clave_lada','$telefono','$correo_electronico','$numero_habitaciones','$descripcion','$precio_noche','$calificacion')";
($conexion->query($sql));
header('Location: ../t_hoteles.php');

?>