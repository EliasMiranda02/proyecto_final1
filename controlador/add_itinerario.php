<?php
include "../modelo/conexion.php"; // Asegúrate de que la conexión esté bien configurada

// Recibir el cuerpo de la solicitud
$data = json_decode(file_get_contents('php://input'), true);

    // Recorre los datos para insertar cada actividad
    foreach ($data as $actividad) {
        // Extraer valores
        $actividadNombre = $actividad['actividad'];
        $dia = $actividad['dia'];
        $hora = $actividad['hora'];
        $detalle = $actividad['detalle'];
        $precio = $actividad['precio'];

        // Mostrar los valores que se van a insertar
        echo "<h4>Guardando Actividad:</h4>";
        echo "Actividad: $actividadNombre<br>";
        echo "Día: $dia<br>";
        echo "Hora: $hora<br>";
        echo "Detalle: $detalle<br>";
        echo "Precio: $precio<br>";

        // Vincular los parámetros
        $stmt->bind_param("ssssd", $actividadNombre, $dia, $hora, $detalle, $precio);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            echo "Actividad '$actividadNombre' guardada exitosamente.<br>";
        } else {
            echo "Error al guardar actividad '$actividadNombre': " . $stmt->error . "<br>";
        }
    }

    // Cerrar la declaración



?>
