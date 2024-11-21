<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Consulta a la tabla paquetes
$sql = "SELECT id_salida, salida, hora FROM salidas";
$result = $conexion->query($sql);

$salidas = array();

if ($result->num_rows > 0) {
    // Guardar los resultados en un array
    while($row = $result->fetch_assoc()) {
        $salidas[] = $row;
    }
}

// Retornar los datos en formato JSON
echo json_encode($salidas);
?>

