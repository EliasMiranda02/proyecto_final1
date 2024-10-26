<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_empleado_editar']) && !empty($_POST['id_empleado_editar'])) {
    $id_empleado_editar = $conexion->real_escape_string($_POST['id_empleado_editar']); // Escapar el ID

    // Obtener los demás datos
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellidoMaterno = $conexion->real_escape_string($_POST['apellido_materno']);
    $apellidoPaterno = $conexion->real_escape_string($_POST['apellido_paterno']);
    $email = $conexion->real_escape_string($_POST['email']);
    $numero = $conexion->real_escape_string($_POST['numero']);
    $nip = $conexion->real_escape_string($_POST['nip']);

    // Preparar la consulta
    $sql = "UPDATE empleados SET 
        nombre = '$nombre', 
        apellido_materno = '$apellidoMaterno', 
        apellido_paterno = '$apellidoPaterno', 
        email = '$email', 
        telefono = '$numero',
        nip = '$nip'
    WHERE id_empleado = '$id_empleado_editar'";

    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../t_empleado.php?mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../t_empleado.php?mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../t_empleado.php?mensaje=no_id');
    exit();
}

?>
