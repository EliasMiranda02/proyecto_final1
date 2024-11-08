<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_empleado_editar']) && !empty($_POST['id_empleado_editar'])) {
    $id_empleado_editar = $conexion->real_escape_string($_POST['id_empleado_editar']); // Escapar el ID

    // Obtener los demás datos
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellidoPaterno = $conexion->real_escape_string($_POST['apellido_paterno']);
    $apellidoMaterno = $conexion->real_escape_string($_POST['apellido_materno']);
    $email = $conexion->real_escape_string($_POST['email']);
    $numero = $conexion->real_escape_string($_POST['numero']);
    $nip = $conexion->real_escape_string($_POST['nip']);
    $disponibilidad = $conexion->real_escape_string($_POST['estado']);
    $lada = $conexion->real_escape_string($_POST['no_lada']);
    $cargo = $conexion->real_escape_string($_POST['cargos']);

    if (isset($_FILES['sellImg']) && $_FILES['sellImg']['error'] == 0) {
        $imagen = $_FILES['sellImg'];
        $rutaImg = 'IMG/empleado/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
    // Preparar la consulta
    $sql = "UPDATE empleados SET 
        nombre = '$nombre', 
        apellido_paterno = '$apellidoPaterno', 
        apellido_materno = '$apellidoMaterno', 
        email = '$email', 
        clave_lada = '$lada',
        telefono = '$numero',
        NIP = '$nip',
        cargo = '$cargo',
        disponibilidad = '$disponibilidad',
        img = '$rutaImg'
    WHERE id_empleado = '$id_empleado_editar'";
    }
    else {
        echo "Error al mover la imagen a la carpeta.";
        exit();
    }
} else{
    $sql = "UPDATE empleados SET 
        nombre = '$nombre', 
        apellido_paterno = '$apellidoPaterno', 
        apellido_materno = '$apellidoMaterno', 
        email = '$email', 
        clave_lada = '$lada',
        telefono = '$numero',
        NIP = '$nip',
        cargo = '$cargo',
        disponibilidad = '$disponibilidad',
    WHERE id_empleado = '$id_empleado_editar'";
}

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
