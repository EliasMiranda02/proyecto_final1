<?php
// Mostrar errores
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Incluir archivo de conexión
include "../modelo/conexion.php";

// Comprobar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_paquete = $_POST['selectedPackageId']; // ID del paquete
    $actividades = $_POST['actividad'];
    $dias = $_POST['dia'];
    $horas = $_POST['hora'];
    $detalles = $_POST['detalle'];
    $precios = $_POST['precio'];

    // Preparar la consulta SQL para insertar en itinerarios
    $stmt = $conexion->prepare("INSERT INTO itinerarios (id_paquete, hora, dia, detalle, nombre_actividad, precio) VALUES (?, ?, ?, ?, ?, ?)");

    // Verificar si la preparación fue exitosa
    if ($stmt === false) {
        die("Error en la preparación de la consulta: " . $conexion->error);
    }

    // Vincular parámetros
    $stmt->bind_param("ssssss", $id_paquete, $hora, $dia, $detalle, $actividad, $precio);

    // Variable para acumular el precio total
    $precio_total = 0;

    // Recorrer los arrays y realizar la inserción
    foreach ($actividades as $index => $actividad) {
        $dia = $dias[$index];
        $hora = $horas[$index];
        $detalle = $detalles[$index];
        $precio = $precios[$index];

        // Validar que los datos no estén vacíos y que el precio sea numérico
        if (!empty($actividad) && !empty($dia) && !empty($hora) && !empty($detalle) && is_numeric($precio)) {
            // Ejecutar la consulta
            if (!$stmt->execute()) {
                echo "Error en la inserción: " . $stmt->error;
            } else {
                // Acumular el precio para el total
                $precio_total += $precio; 
            }
        } else {
            echo "Datos inválidos para la actividad: $actividad<br>";
        }
    }

    // Cerrar la sentencia
    $stmt->close();

    // Insertar en la tabla precios_paquete
    $stmtPrecio = $conexion->prepare("INSERT INTO paquetes_precios (id_paquete, precio_total) VALUES (?, ?)");

    // Verificar si la preparación fue exitosa
    if ($stmtPrecio === false) {
        die("Error en la preparación de la consulta para precios_paquete: " . $conexion->error);
    }

    // Vincular parámetros
    $stmtPrecio->bind_param("sd", $id_paquete, $precio_total);

    // Ejecutar la inserción en precios_paquete
    if (!$stmtPrecio->execute()) {
        echo "Error al insertar en precios_paquete: " . $stmtPrecio->error;
    }

    // Cerrar la sentencia y la conexión
    $stmtPrecio->close();
    $conexion->close();

    // Redirigir después de la inserción
    header('Location: ../form_paquete_intinerario.php');
    exit(); // Asegúrate de salir después de redirigir
}
?>
