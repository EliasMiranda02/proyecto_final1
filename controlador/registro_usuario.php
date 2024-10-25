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

            // Insertar los datos en la base de datos
            $sql = $conexion->query("INSERT INTO clientes (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña) 
                VALUES ('$nombre', '$amaterno', '$apaterno', '$email', '$lada', '$telefono', NOW(), '$contraseña')");

            // Verificar si la consulta fue exitosa
            if ($sql) {
                echo "Registro exitoso.";
            } else {
                echo "Error al insertar datos: " . $conexion->error;
            }
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
