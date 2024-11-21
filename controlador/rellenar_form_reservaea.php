<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Consulta a la tabla paquetes
$sql = "SELECT id_excursion, ubicacion, precio FROM excursiones";
$result = $conexion->query($sql);

$excursiones = array();

if ($result->num_rows > 0) {
    // Guardar los resultados en un array
    while($row = $result->fetch_assoc()) {
        $excursiones[] = $row;
    }
}

// Retornar los datos en formato JSON
echo json_encode($excursiones);
?>