<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM recorridos" : "SELECT * FROM recorridos WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col"></th>';
    echo '        <th scope="col">id_recorrido</th>';
    echo '        <th scope="col">id_ruta</th>';
    echo '        <th scope="col">fecha_salida</th>';
    echo '        <th scope="col">fecha_llegada</th>';
    echo '        <th scope="col">precio_boleto</th>';
    echo '        <th scope="col" class="text-center">estado</th>';
    echo '    </tr>';
    echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_recorrido}'></td>";
        echo "<th scope='row'>{$datos->id_recorrido}</th>";
        echo "<th scope='row'>{$datos->id_ruta}</th>";
        echo "<td>{$datos->fecha_salida}</td>";
        echo "<td>{$datos->fecha_llegada}</td>";
        echo "<td>{$datos->precio_boleto}</td>";
        echo "<td>{$datos->estado}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>
