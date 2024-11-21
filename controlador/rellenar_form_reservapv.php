<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Consulta a la tabla paquetes
$sql = "SELECT id_paquete, nombre, precio_aproximado FROM paquetes";
$result = $conexion->query($sql);

$paquetes = array();

if ($result->num_rows > 0) {
    // Guardar los resultados en un array
    while($row = $result->fetch_assoc()) {
        $paquetes[] = $row;
    }
}

// Retornar los datos en formato JSON
echo json_encode($paquetes);
?>

