<?php
// controlador/INSERT_INTO/t_add_empleado.php

include "../modelo/conexion.php"; // Ajustar la ruta según la ubicación del archivo

// Muestra todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!empty($_POST["registrar"])) {
    // Verificar que todos los campos requeridos están presentes
    if (!empty($_POST["nombre"]) && !empty($_POST["apaterno"]) && !empty($_POST["amaterno"]) && !empty($_POST["email"]) && 
        !empty($_POST["contraseña1"]) && !empty($_POST["contraseña2"]) && !empty($_POST["opcion"]) && !empty($_POST["numero"]) &&
        !empty($_POST["nombre_usuario"]) && !empty($_POST["nip"]) && !empty($_POST["cargo"])) {

        // Verificar que las contraseñas coinciden
        if ($_POST["contraseña1"] === $_POST["contraseña2"]) {
            $nombre = $_POST["nombre"];
            $apaterno = $_POST["apaterno"];
            $amaterno = $_POST["amaterno"];
            $email = $_POST["email"];
            $contraseña = password_hash($_POST["contraseña1"], PASSWORD_DEFAULT); // Contraseña cifrada
            $lada = $_POST["opcion"];
            $telefono = $_POST["numero"];
            $nombre_usuario = $_POST["nombre_usuario"];
            $NIP = $_POST["nip"];
            $cargo = $_POST["cargo"];

            // Consulta preparada para insertar los datos
            $stmt = $conexion->prepare("INSERT INTO empleados (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo) 
                VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?)");

            // Si la preparación falla, muestra el error
            if (!$stmt) {
                echo "Error al preparar la consulta: " . $conexion->error;
                exit();
            }

            // Vincular parámetros
            $stmt->bind_param("ssssssssss", $nombre, $amaterno, $apaterno, $email, $lada, $telefono, $contraseña, $nombre_usuario, $NIP, $cargo);

            // Ejecutar la consulta y verificar si fue exitosa
            if ($stmt->execute()) {
                // Redireccionar con mensaje de éxito
                header("Location: ../t_empleado.php?mensaje=registrado");
                exit();
            } else {
                echo "Error al insertar datos: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Las contraseñas no coinciden.";
        }
    } else {
        echo "Todos los campos son obligatorios.";
    }
}
?>
