<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM carros" : "SELECT * FROM carros WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col"></th>';
    echo '        <th scope="col">id_carro</th>';
    echo '        <th scope="col">marca</th>';
    echo '        <th scope="col">modelo</th>';
    echo '        <th scope="col">año_fabricacion</th>';
    echo '        <th scope="col" class="text-center">color</th>';
    echo '        <th scope="col" class="text-center">placa</th>';
    echo '        <th scope="col">precio_renta</th>';
    echo '        <th scope="col">cantidad_dias</th>';
    echo '        <th scope="col">capacidad</th>';
    echo '        <th scope="col">estado</th>';
    echo '    </tr>';
    echo '</thead>';
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_carro}'></td>";
        echo "<th scope='row'>{$datos->id_carro}</th>";
        echo "<td>{$datos->marca}</td>";
        echo "<td>{$datos->modelo}</td>";
        echo "<td>{$datos->año_fabricacion}</td>";
        echo "<td>{$datos->color}</td>";
        echo "<td>{$datos->placa}</td>";
        echo "<td>{$datos->precio_renta}</td>";
        echo "<td>{$datos->cantidad_dias}</td>";
        echo "<td>{$datos->capacidad}</td>";
        echo "<td>{$datos->estado}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>