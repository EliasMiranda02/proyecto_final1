<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

$correo = $_POST['correo'];
$clave = $_POST['contraseña'];

include '../modelo/conexion.php'; //PERMITIR UTILIZAR METODOS DE OTRO SCRIPT EN OTRO SCRIPT

if ($conexion->connect_errno) {
    echo "No se puede conectar a MySQL: " . $conexion->connect_error;
    exit();
}

// Consultar en la tabla empleados
$consultaEmpleados = "SELECT * FROM empleados WHERE email = '$correo' AND contraseña = '$clave'";
$resultadoEmpleados = mysqli_query($conexion, $consultaEmpleados);

// Consultar en la tabla clientes
$consultaClientes = "SELECT * FROM clientes WHERE email = '$correo' AND contraseña = '$clave'";
$resultadoClientes = mysqli_query($conexion, $consultaClientes);

$filaEmpleados = $resultadoEmpleados ? mysqli_fetch_assoc($resultadoEmpleados) : null;
$filaClientes = $resultadoClientes ? mysqli_fetch_assoc($resultadoClientes) : null;

// Verificar si el usuario pertenece a empleados
if ($filaEmpleados && $filaEmpleados['email'] == $correo && $filaEmpleados['contraseña'] == $clave) {
    header("Location: ../index.php?i=home"); // Página para empleados
    exit();
}
// Verificar si el usuario pertenece a clientes
elseif ($filaClientes && $filaClientes['email'] == $correo && $filaClientes['contraseña'] == $clave) {
    header("Location: ../index.php?i=home"); // Página para clientes
    exit();
} else {
    // Si no se encuentra en ninguna tabla
    header("Location: ../index.php?i=index&mensaje=incorrecto");
    exit();
}
?>
