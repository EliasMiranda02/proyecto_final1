<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "../modelo/conexion.php";

// Verifica que se haya enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Depuración: imprimir los datos enviados
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";

    // Captura y sanitiza los datos del formulario
    $packageId = isset($_POST['packageId']) ? $conexion->real_escape_string($_POST['packageId']) : '';
    $precio_total = isset($_POST['precio_total']) ? $conexion->real_escape_string($_POST['precio_total']) : '';

    // Asegúrate de que los campos de actividades existan
    $actividades = isset($_POST['actividad']) ? $_POST['actividad'] : [];
    $dias = isset($_POST['dia']) ? $_POST['dia'] : [];
    $horas = isset($_POST['hora']) ? $_POST['hora'] : [];
    $detalles = isset($_POST['detalle']) ? $_POST['detalle'] : [];
    $precios = isset($_POST['precio']) ? $_POST['precio'] : [];

    // Verifica que los campos son arreglos
    if (!is_array($actividades) || !is_array($dias) || !is_array($horas) || !is_array($detalles) || !is_array($precios)) {
        echo "Uno de los campos no es un arreglo.";
        exit;
    }

    // Prepara la consulta para insertar
    $stmt = $conexion->prepare("INSERT INTO itinerarios (id_paquete, hora, dia, detalle, nombre_actividad, precio) VALUES (?, ?, ?, ?, ?, ?)");

    // Verifica si la preparación fue exitosa
    if (!$stmt) {
        echo "Error en la preparación de la consulta: " . $conexion->error;
        exit;
    }

    foreach ($actividades as $index => $actividad) {
        // Sanitiza los valores
        $actividad = $conexion->real_escape_string(htmlspecialchars($actividad));
        $dia = $conexion->real_escape_string(htmlspecialchars($dias[$index]));
        $hora = $conexion->real_escape_string(htmlspecialchars($horas[$index]));
        $detalle = $conexion->real_escape_string(htmlspecialchars($detalles[$index]));
        $precio = isset($precios[$index]) ? floatval($precios[$index]) : 0;

        // Vincula los parámetros
        $stmt->bind_param("ssssds", $packageId, $hora, $dia, $detalle, $actividad, $precio);

        // Ejecuta la consulta
        if (!$stmt->execute()) {
            echo "Error al insertar datos: " . $stmt->error;
        }
    }

    // Cierra la declaración
    $stmt->close();
    echo "Itinerarios agregados con éxito.";
}

// Cierra la conexión
$conexion->close();
?>
