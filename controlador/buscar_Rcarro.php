<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM renta_carros" : "SELECT * FROM renta_carros WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {

    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col" class="text-center">id_renta</th>';
    echo '        <th scope="col" class="text-center">id_carro</th>';
    echo '        <th scope="col" class="text-center">id_cliente</th>';
    echo '        <th scope="col" class="text-center">fecha_renta</th>';
    echo '        <th scope="col" class="text-center">fecha_devolucion</th>';
    echo '        <th scope="col" class="text-center">estado_renta</th>';
    echo '        <th scope="col" class="text-center">dias_rentados</th>';
    echo '    </tr>';
    echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<th scope='row' class='text-center'>{$datos->id_renta}</th>";
        echo "<td class='text-center'>{$datos->id_carro}</td>";
        echo "<td class='text-center'>{$datos->id_cliente}</td>";
        echo "<td class='text-center'>{$datos->fecha_renta}</td>";
        echo "<td class='text-center'>{$datos->fecha_devolucion}</td>";
        echo "<td class='text-center'>{$datos->estado_renta}</td>";
        echo "<td class='text-center'>{$datos->dias_rentados}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>