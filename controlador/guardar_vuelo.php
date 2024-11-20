<?php

require "../modelo/conexion.php";

$no_vuelo = $conexion->real_escape_string($_POST['no_vuelo']);
$origen = $conexion->real_escape_string($_POST['origen']);
$destino = $conexion->real_escape_string($_POST['destino']);
$date_salida = date('Y-m-d', strtotime($_POST['date_salida']));
$hora_salida = date('H:i:s', strtotime($_POST['time_salida']));
$date_llegada = date('Y-m-d', strtotime($_POST['date_llegada']));
$hora_llegada = date('H:i:s', strtotime($_POST['time_llegada']));

$precio= $conexion->real_escape_string($_POST['precio']);
$precio = preg_replace('/[^0-9.]/', '', $precio);

$sql = "INSERT INTO vuelos (numero_vuelo, origen, destino, fecha_salida, hora_salida ,fecha_llegada, hora_llegada ,precio_vuelo) 
VALUES('$no_vuelo','$origen','$destino','$date_salida','$hora_salida','$date_llegada','$hora_llegada','$precio')";
($conexion->query($sql));
header('Location: ../index.php?i=volante&mensaje=registro_exitoso');

?>