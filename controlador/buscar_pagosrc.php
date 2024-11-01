<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM pagos_rc" : "SELECT * FROM pagos_rc WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {

    echo '<thead class="bg-info">';
    echo '    <tr>';
    echo '        <th scope="col">id_pagorc</th>';
    echo '        <th scope="col">id_renta</th>';
    echo '        <th scope="col">id_tarjeta</th>';
    echo '        <th scope="col">fecha_pago</th>';
    echo '        <th scope="col">monto_total</th>';
    echo '    </tr>';
    echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<th scope='row'>{$datos->id_pagorc}</th>";
        echo "<td>{$datos->id_renta}</td>";
        echo "<td>{$datos->id_tarjeta}</td>";
        echo "<td>{$datos->fecha_pago}</td>";
        echo "<td>{$datos->monto_total}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>