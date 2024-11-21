<?php
include "../modelo/conexion.php";

// Obtener la fecha del formulario
$date = $_POST['fecha'];
$date = $conexion->real_escape_string($date); // Sanitizar entrada para evitar inyección SQL

// Verificar si se proporcionó una fecha
$sqlQuery = "
    SELECT 
        renta_carros.fecha_renta,
        renta_carros.dias_rentados,
        renta_carros.fecha_devolucion,
        renta_carros.estado_renta,
        carros.modelo,
        carros.precio_renta,
        carros.img
    FROM
        carros
    INNER JOIN
        renta_carros
    ON
        carros.id_carro = renta_carros.id_carro
    WHERE
        DATE(renta_carros.fecha_renta) = '$date'
";

// Ejecutar la consulta
$sql = $conexion->query($sqlQuery);

// Verificar si hay resultados
if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<th scope='row' class='text-center'>{$datos->fecha_renta}</th>";
        echo "<td class='text-center'>{$datos->modelo}</td>";
        echo "<td class='text-center'>{$datos->dias_rentados}</td>";
        echo "<td class='text-center'>$" . number_format($datos->precio_renta, 2) . "</td>";
        echo "<td class='text-center'>{$datos->fecha_devolucion}</td>";
        echo "<td class='text-center'>{$datos->estado_renta}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='6' class='text-center'>No se encontraron resultados para la fecha especificada.</td></tr>";
}

// Cerrar conexión
$conexion->close();
?>
