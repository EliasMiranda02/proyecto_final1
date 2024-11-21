<?php
include "../modelo/conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Verificar si se recibieron los datos esperados del formulario
$id_vuelo = $conexion->real_escape_string($_POST['id_vuelo']);
$fecha_reserva = $conexion->real_escape_string($_POST['fecha']);
$lugar_salida = $conexion->real_escape_string($_POST['destino']);
$hora_salida = $conexion->real_escape_string($_POST['hora']);
$fecha_salida = $conexion->real_escape_string($_POST['fecha_salida']);
$cantidad_asientos = $conexion->real_escape_string($_POST['cantidad']);
$total = $conexion->real_escape_string($_POST['total']);
$total = preg_replace('/[^0-9.]/', '', $total);

$sql = "INSERT INTO reservas_v (id_vuelo, fecha_reserva, estado, lugar_salida, hora_salida, fecha_salida, cantidad_asiento, total)
                VALUES ('$id_vuelo', '$fecha_reserva', 'Reservado', '$lugar_salida', '$hora_salida', '$fecha_salida', '$cantidad_asientos', '$total')";

// Ejecutar el query e insertar los datos
if ($conexion->query($sql) === TRUE) {
    header('Location: ../index.php?i=reservavusuario&mensaje=registro_exitoso');
} else {
    header('Location: ../index.php?i=reservavusuario&mensaje=error&detalle=' . $conexion->error);
}

$conexion->close();
