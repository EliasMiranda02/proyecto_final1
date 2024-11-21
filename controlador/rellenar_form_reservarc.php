<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta esté correcta

// Consulta a la tabla paquetes
$sql = "SELECT id_carro, modelo, precio_renta, capacidad FROM carros";
$result = $conexion->query($sql);

$carros = array();

if ($result->num_rows > 0) {
    // Guardar los resultados en un array
    while($row = $result->fetch_assoc()) {
        $carros[] = $row;
    }
}

// Retornar los datos en formato JSON
echo json_encode($carros);
?>