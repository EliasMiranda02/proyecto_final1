<?php

require "../modelo/conexion.php";


$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$precio_aproximado = $conexion->real_escape_string($_POST['precio_aproximado']);
$duracion_horas = $conexion->real_escape_string($_POST['duracion_horas']);
$ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
$clasificacion = $conexion->real_escape_string($_POST['clasificacion']);
$cantidad_maxima = $conexion->real_escape_string($_POST['cantidad_maxima']);


$sql = "INSERT INTO excursiones (descripcion, precio_aproximado, duracion_horas, ubicacion, clasificacion, cantidad_maxima, fecha_creacion, fecha_modificacion) 
VALUES('$descripcion', '$precio_aproximado', '$duracion_horas', '$ubicacion', '$clasificacion', '$cantidad_maxima', NOW(), NOW())";
($conexion->query($sql));
header('Location: ../t_excursiones.php');

?>