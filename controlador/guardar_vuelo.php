<?php

require "../modelo/conexion.php";

$no_vuelo = $conexion->real_escape_string($_POST['no_vuelo']);
$origen = $conexion->real_escape_string($_POST['origen']);
$destino = $conexion->real_escape_string($_POST['destino']);
$date_salida = date('Y-m-d H:i:s', strtotime($_POST['date_salida']));
$date_llegada = date('Y-m-d H:i:s', strtotime($_POST['date_llegada']));
$precio= $conexion->real_escape_string($_POST['precio']);

$sql = "INSERT INTO vuelos (numero_vuelo, origen, destino, fecha_salida, fecha_llegada, precio_vuelo) 
VALUES('$no_vuelo','$origen','$destino','$date_salida','$date_llegada','$precio')";
($conexion->query($sql));
header('Location: ../t_volante.php');

?>