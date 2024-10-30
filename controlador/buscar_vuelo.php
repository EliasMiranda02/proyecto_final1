<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM vuelos" : "SELECT * FROM vuelos WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col"></th>';
    echo '        <th scope="col">id_vuelo</th>';
    echo '        <th scope="col">numero_vuelo</th>';
    echo '        <th scope="col">origen</th>';
    echo '        <th scope="col">destino</th>';
    echo '        <th scope="col" class="text-center">fecha_llegada</th>';
    echo '        <th scope="col" class="text-center">fecha_salida</th>';
    echo '        <th scope="col">precio_vuelo</th>';
    echo '    </tr>';
    echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_vuelo}'></td>";
        echo "<th scope='row'>{$datos->id_vuelo}</th>";
        echo "<td>{$datos->numero_vuelo}</td>";
        echo "<td>{$datos->origen}</td>";
        echo "<td>{$datos->destino}</td>";
        echo "<td>{$datos->fecha_salida}</td>";
        echo "<td class='text-center'>{$datos->fecha_llegada}</td>";
        echo "<td>{$datos->precio_vuelo}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>
