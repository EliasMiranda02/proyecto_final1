<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_usuario_editar']) && !empty($_POST['id_usuario_editar'])) {
    $id_usuario_editar = $conexion->real_escape_string($_POST['id_usuario_editar']); // Escapar el ID

    // Obtener los demás datos
    $nombre = $conexion->real_escape_string($_POST['nombre']);
    $apellidoMaterno = $conexion->real_escape_string($_POST['apellido_materno']);
    $apellidoPaterno = $conexion->real_escape_string($_POST['apellido_paterno']);
    $email = $conexion->real_escape_string($_POST['email']);
    $pass = $conexion->real_escape_string($_POST['pass']);
    $numero = $conexion->real_escape_string($_POST['numero']); // Ajustar según el tipo de la columna en la BD

    // Construir la consulta para actualizar el registro
    $sql = "UPDATE clientes SET 
                nombre = '$nombre', 
                apellido_materno = '$apellidoMaterno', 
                apellido_paterno = '$apellidoPaterno', 
                email = '$email', 
                contraseña = '$pass', 
                telefono = '$numero' 
            WHERE id_cliente = '$id_usuario_editar'";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=usuario&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=usuario&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=usuario&mensaje=no_id');
    exit();
}
?>
