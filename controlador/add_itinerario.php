<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

var_dump($_POST); // Verifica los datos enviados por el formulario

include "../modelo/conexion.php";

// Captura y sanitiza el ID del paquete
$id_paquete = $conexion->real_escape_string($_POST['packageId']);

// Verifica si se envió el campo de actividades
if (isset($_POST['activities'])) {
    // Decodifica el JSON de actividades
    $activities = json_decode($_POST['activities'], true);

    // Prepara la consulta para insertar
    $sql = "INSERT INTO itinerarios (id_paquete, hora, dia, detalle, nombre_actividad, precio) VALUES ";

    // Inicializa un array para las partes de la consulta
    $values = [];

    foreach ($activities as $activity) {
        // Sanitiza los datos de cada actividad
        $horas = $conexion->real_escape_string($activity['hora']);
        $dias = date('Y-m-d', strtotime($activity['dia'])); // Asegúrate de que el formato sea correcto
        $detalle = $conexion->real_escape_string($activity['detalle']);
        $nombre_actividad = $conexion->real_escape_string($activity['actividad']);
        $precios = $conexion->real_escape_string($activity['precio']); 

        // Agrega los valores a la consulta
        $values[] = "('$id_paquete', '$horas', '$dias', '$detalle', '$nombre_actividad', '$precios')";
    }

    // Concatena las partes de valores en la consulta SQL
    $sql .= implode(", ", $values);

    // Ejecuta la consulta y verifica si hay errores
    if ($conexion->query($sql) === TRUE) {
        echo "Inserciones realizadas con éxito";
        header('Location: ../form_paquete_intinerario.php');
    } else {
        echo "Error al insertar: " . $conexion->error;
    }
} else {
    echo "No se recibieron actividades para insertar.";
}

$conexion->close();
?>
