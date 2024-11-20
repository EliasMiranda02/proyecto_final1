<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Verificar que se haya enviado el ID y los datos necesarios para la actualización
if (isset($_POST['id_carro_editar']) && !empty($_POST['id_carro_editar'])) {
    $id_carro_editar = $conexion->real_escape_string($_POST['id_carro_editar']); // Escapar el ID

    // Obtener los demás datos
    
    $modelo = $conexion->real_escape_string($_POST['modelos']);
    
    $precio = $conexion->real_escape_string($_POST['precios']);
    $precio = preg_replace('/[^0-9.]/', '', $precio);

    $capacidad = $conexion->real_escape_string($_POST['capacidades']);
    $estado = $conexion->real_escape_string($_POST['estado']);


    if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
        $imagen = $_FILES['selImg'];
        $rutaImg = 'IMG/rodante/' . basename($imagen['name']); // Define la ruta donde se guardará la imagen
        if (move_uploaded_file($imagen['tmp_name'], '../' . $rutaImg)) {
    // Construir la consulta para actualizar el registro
            $sql = "UPDATE carros SET 
                        modelo = '$modelo', 
                        precio_renta = '$precio',
                        capacidad = '$capacidad',
                        estado = '$estado',
                        img = '$rutaImg'
                    WHERE id_carro = '$id_carro_editar'";
        }
        else {
            echo "Error al mover la imagen a la carpeta.";
            exit();
        }
    } else{
        $sql = "UPDATE carros SET 
                        modelo = '$modelo', 
                        precio_renta = '$precio',
                        capacidad = '$capacidad',
                        estado = '$estado'
                    WHERE id_carro = '$id_carro_editar'";
    }

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        // Redirigir con éxito
        header('Location: ../index.php?i=catacarro&mensaje=actualizado');
        exit();
    } else {
        // Manejar errores
        header('Location: ../index.php?i=catacarro&mensaje=error&detalle=' . urlencode($conexion->error));
        exit();
    }
} else {
    // Si no se enviaron datos
    header('Location: ../index.php?i=catacarro&mensaje=no_id');
    exit();
}
?>
