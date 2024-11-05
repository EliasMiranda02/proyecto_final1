<?php

require "../modelo/conexion.php";


$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$precio = $conexion->real_escape_string($_POST['precio']);
$duracion_horas = $conexion->real_escape_string($_POST['duracion_horas']);
$ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
$clasificacion = $conexion->real_escape_string($_POST['clasificacion']);



$sql = "INSERT INTO excursiones (descripcion, precio, duracion_horas, ubicacion, clasificacion, fecha_creacion, fecha_modificacion) 
VALUES('$descripcion', '$precio', '$duracion_horas', '$ubicacion', '$clasificacion', NOW(), NOW())";
($conexion->query($sql));
header('Location: ../t_excursiones.php?mensaje=registro_exitoso');

?>