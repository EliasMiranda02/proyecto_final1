<?php

include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $conexion->real_escape_string($_POST['id']);

    // Verificar que el ID sea un número válido
    if (is_numeric($id)) {
        $sql = "DELETE FROM clientes WHERE id_cliente = $id";

        if ($conexion->query($sql) === TRUE) {
            // Redirigir con éxito
            header('Location: ../t_usuario.php?mensaje=eliminado');
            exit();
        } else {
            // Manejar errores
            header('Location: ../t_usuario.php?mensaje=error');
            exit();
        }
    } else {
        // Si el ID no es válido
        header('Location: ../t_usuario.php?mensaje=id_invalido');
        exit();
    }
} else {
    // Si no se envió el ID
    header('Location: ../t_usuario.php?mensaje=no_id');
    exit();
}

?>
