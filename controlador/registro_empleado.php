<?php
session_start();
include "modelo/conexion.php";

// Muestra todos los errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (!empty($_POST["registrar"])) {
    // Verificar que todos los campos requeridos están presentes
    if (!empty($_POST["nombre"]) && !empty($_POST["apaterno"]) && !empty($_POST["amaterno"]) && !empty($_POST["email"]) && 
        !empty($_POST["contraseña1"]) && !empty($_POST["contraseña2"]) && !empty($_POST["opcion"]) && !empty($_POST["numero"])
        && !empty($_POST["nombre_usuario"]) && !empty($_POST["nip"]) && !empty($_POST["cargo"])) {

        // Verificar que las contraseñas coinciden
        if ($_POST["contraseña1"] === $_POST["contraseña2"]) {
            $nombre = $conexion->real_escape_string($_POST["nombre"]);
            $amaterno = $conexion->real_escape_string($_POST["amaterno"]);
            $apaterno = $conexion->real_escape_string($_POST["apaterno"]);
            $email = $conexion->real_escape_string($_POST["email"]);
            $contraseña = $conexion->real_escape_string($_POST["contraseña1"]);  
            $lada = $conexion->real_escape_string($_POST["opcion"]);
            $telefono = $conexion->real_escape_string($_POST["numero"]);
            $nombre_usuario = $conexion->real_escape_string($_POST["nombre_usuario"]);
            $NIP = $conexion->real_escape_string($_POST["nip"]);
            $cargo = $conexion->real_escape_string($_POST["cargo"]);
            $disponibilidad = '';
            // Consulta preparada para insertar los datos
            $stmt = $conexion->prepare("INSERT INTO empleados (nombre, apellido_materno, apellido_paterno, email, clave_lada, telefono, fecha_registro, contraseña, nombre_usuario, NIP, cargo, disponibilidad) 
VALUES (?, ?, ?, ?, ?, ?, NOW(), ?, ?, ?, ?,?)");

            // Asegúrate de que el número de tipos coincida (11 tipos para 11 variables)
            if (!$stmt) {
                echo "Error al preparar la consulta: " . $conexion->error;
                exit();
            }

            // Ajusta el tipo para cada campo (aquí no se incluye 'fecha_registro' porque se maneja en la consulta)
            $stmt->bind_param("sssssssssss", $nombre, $amaterno, $apaterno, $email, $lada, $telefono, $contraseña, $nombre_usuario, $NIP, $cargo,$disponibilidad);

            // Ejecutar la consulta y verificar si fue exitosa
            if ($stmt->execute()) {
                $_SESSION['mensaje'] = "Registro exitoso!";
                header('Location: registro_empleado.php'); // Redirigir después del registro exitoso
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
