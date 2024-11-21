<?php
include "../modelo/conexion.php";

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Verificar si se recibieron los datos esperados del formulario
$id_carro = $conexion->real_escape_string($_POST['selectedPackageId']);
$fecha_renta = $conexion->real_escape_string($_POST['fecha']);
$fecha_devolucion = $conexion->real_escape_string($_POST['fecha_salida']);
$dias_rentados = $conexion->real_escape_string($_POST['cantidad']);
$total = $conexion->real_escape_string($_POST['total']);
$total = preg_replace('/[^0-9.]/', '', $total);

$sql = "INSERT INTO renta_carros (id_carro, fecha_renta, fecha_devolucion, estado_renta, dias_rentados, total)
                VALUES ('$id_carro', '$fecha_renta','$fecha_devolucion', 'Reservado', '$dias_rentados', '$total')";

// Ejecutar el query e insertar los datos
if ($conexion->query($sql) === TRUE) {
    header('Location: ../index.php?i=reservarcusuario&mensaje=registro_exitoso');
} else {
    header('Location: ../index.php?i=reservarcusuario&mensaje=error&detalle=' . $conexion->error);
}

$conexion->close();
