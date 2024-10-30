<?php

require "../modelo/conexion.php";

$nombre = $conexion->real_escape_string($_POST['nombre']);
$descripcion = $conexion->real_escape_string($_POST['descripcion']);
$precio_aproximado = $conexion->real_escape_string($_POST['precio_aproximado']);
$duracion_horas = $conexion->real_escape_string($_POST['duracion_horas']);
$ubicacion = $conexion->real_escape_string($_POST['ubicacion']);
$clasificacion = $conexion->real_escape_string($_POST['clasificacion']);
$cantidad_maxima = $conexion->real_escape_string($_POST['cantidad_maxima']);
$porcentaje_descuento = $conexion->real_escape_string($_POST['porcentaje_descuento']);
$precio_porcentaje = $conexion->real_escape_string($_POST['precio_porcentaje']);
$disponibilidad = $conexion->real_escape_string($_POST['disponibilidad']);

$sql = "INSERT INTO excursiones (nombre, descripcion, precio_aproximado, duracion_horas, ubicacion, clasificacion, cantidad_maxima, porcentaje_descuento, precio_porcentaje, fecha_creacion, fecha_modificacion, disponibilidad) 
VALUES('$nombre', '$descripcion', '$precio_aproximado', '$duracion_horas', '$ubicacion', '$clasificacion', '$cantidad_maxima', '$porcentaje_descuento', '$precio_porcentaje', NOW(), NOW(), '$disponibilidad')";
($conexion->query($sql));
header('Location: ../t_excursiones.php');

?>