<?php
include "../modelo/conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Verificar si se recibieron los datos esperados del formulario
$id_excursion = $conexion->real_escape_string($_POST['selectedPackageId']);
$fecha_reserva = $conexion->real_escape_string($_POST['fecha']);
$lugar_salida = $conexion->real_escape_string($_POST['lugar_salida']);
$hora_salida = $conexion->real_escape_string($_POST['hora']);
$fecha_salida = $conexion->real_escape_string($_POST['fecha_salida']);
$cantidad_asientos = $conexion->real_escape_string($_POST['cantidad']);
$precio_excursion = $conexion->real_escape_string($_POST['total']);
$precio_excursion = preg_replace('/[^0-9.]/', '', $precio_excursion);

$sql = "INSERT INTO reservas_ea (id_excursion, fecha_reserva, estado_reserva, lugar_salida, hora_salida, fecha_salida, cantidad_asientos, precio_excursion)
                VALUES ('$id_excursion', '$fecha_reserva', 'Reservado', '$lugar_salida', '$hora_salida', '$fecha_salida', '$cantidad_asientos', '$precio_excursion')";

// Ejecutar el query e insertar los datos
if ($conexion->query($sql) === TRUE) {
    header('Location: ../index.php?i=reservaeausuario&mensaje=registro_exitoso');
} else {
    header('Location: ../index.php?i=reservaeausuario&mensaje=error&detalle=' . $conexion->error);
}

$conexion->close();
