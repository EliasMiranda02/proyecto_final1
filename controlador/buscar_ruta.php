<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM rutas" : "SELECT * FROM rutas WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col"></th>';
    echo '        <th scope="col" class="text-center">id_ruta</th>';
    echo '        <th scope="col" class="text-center">origen</th>';
    echo '        <th scope="col" class="text-center">destino</th>';
    echo '        <th scope="col" class="text-center">distancia</th>';
    echo '        <th scope="col" class="text-center">duracion</th>';
    echo '        <th scope="col" class="text-center">matricula</th>';
    echo '    </tr>';
    echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_ruta}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_ruta}</th>";
        echo "<td class='text-center'>{$datos->origen}</td>";
        echo "<td class='text-center'>{$datos->destino}</td>";
        echo "<td class='text-center'>{$datos->distancia}</td>";
        echo "<td class='text-center'>{$datos->duracion}</td>";
        echo "<td class='text-center'>{$datos->matricula}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>
