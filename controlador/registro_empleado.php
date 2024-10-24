<?php
    include "modelo/conexion.php";

    if (!empty($_POST["registrar"])) {
        // Verificar que todos los campos requeridos están presentes
        if (!empty($_POST["nombre"]) && !empty($_POST["apaterno"]) && !empty($_POST["amaterno"]) && !empty($_POST["email"]) && 
            !empty($_POST["contraseña1"]) && !empty($_POST["contraseña2"]) && !empty($_POST["opcion"]) && !empty($_POST["numero"])
            && !empty($_POST["nombre_usuario"]) && !empty($_POST["nip"]) && !empty($_POST["cargo"])) {

            // Verificar que las contraseñas coinciden
            if ($_POST["contraseña1"] === $_POST["contraseña2"]) {
                $nombre = $_POST["nombre"];
                $amaterno = $_POST["amaterno"];
                $apaterno = $_POST["apaterno"];
                $email = $_POST["email"];
                $contraseña = $_POST["contraseña1"];  // Contraseña confirmada
                $lada = $_POST["opcion"];
                $telefono = $_POST["numero"];
                $nombre_usuario = $_POST["nombre_usuario"];
                $NIP = $_POST["nip"];
                $cargo = $_POST["cargo"];

                // Insertar los datos en la base de datos
                $sql = $conexion->query("INSERT INTO empleados (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo) 
                    VALUES ('$nombre', '$amaterno', '$apaterno', '$email', '$lada', '$telefono', NOW(), '$contraseña', '$nombre_usuario', '$NIP', '$cargo')");

                // Verificar si la consulta fue exitosa
                if ($sql) {
                    echo "Registro exitoso.";
                } else {
                    echo "Error al insertar datos: " . $conexion->error;
                }
            } else {
                echo "Error";
            }
        } else {
            echo "Todos los campos son obligatorios.";
        }
    }
?>
