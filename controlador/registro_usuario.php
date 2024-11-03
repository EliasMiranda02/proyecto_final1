<?php
include "modelo/conexion.php";

if (!empty($_POST["registrar"])) {
    // Verificar que todos los campos requeridos están presentes
    if (!empty($_POST["nombre"]) && !empty($_POST["apaterno"]) && !empty($_POST["amaterno"]) && !empty($_POST["email"]) && 
        !empty($_POST["contraseña1"]) && !empty($_POST["contraseña2"]) && !empty($_POST["opcion"]) && !empty($_POST["numero"])) {

        // Verificar que las contraseñas coinciden
        if ($_POST["contraseña1"] === $_POST["contraseña2"]) {
            $nombre = $conexion->real_escape_string($_POST["nombre"]);
            $amaterno = $conexion->real_escape_string($_POST["amaterno"]);
            $apaterno = $conexion->real_escape_string($_POST["apaterno"]);
            $email = $conexion->real_escape_string($_POST["email"]);
            $contraseña = $conexion->real_escape_string($_POST["contraseña1"]);  // Contraseña confirmada
            $lada = $conexion->real_escape_string($_POST["opcion"]);
            $telefono = $conexion->real_escape_string($_POST["numero"]);

            // Manejo de la carga de la imagen
            if (isset($_FILES['selImg']) && $_FILES['selImg']['error'] == 0) {
                $imagen = $_FILES['selImg'];
                $rutaImg = 'IMG/cliente/' . basename($imagen['name']);

                // Mover el archivo a la carpeta deseada
                if (move_uploaded_file($imagen['tmp_name'], $rutaImg)) {
                    // Insertar los datos en la base de datos, incluyendo la ruta de la imagen
                    $sql = $conexion->query("INSERT INTO clientes (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, img) 
                        VALUES ('$nombre', '$amaterno', '$apaterno', '$email', '$lada', '$telefono', NOW(), '$contraseña', '$rutaImg')");

                    // Verificar si la consulta fue exitosa
                    if ($sql) {
                        $_SESSION['mensaje'] = "Registro exitoso!";
                        header("Location: registro.php");
                        exit();
                    } else {
                        echo "Error al insertar datos: " . $conexion->error;
                    }
                } else {
                    echo "Error al mover la imagen a la carpeta.";
                }
            } else {
                echo "Error en la carga de la imagen.";
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
