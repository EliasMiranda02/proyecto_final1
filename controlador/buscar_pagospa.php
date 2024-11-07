<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM pagos_pa" : "SELECT * FROM pagos_pa WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='hidden' name='ids[]' value='{$datos->id_pagopa}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_pagopa}</th>";
        echo "<td class='text-center'>{$datos->id_reservapa}</td>";
        echo "<td class='text-center'>{$datos->id_tarjeta}</td>";
        echo "<td class='text-center'>{$datos->fecha_pago}</td>";
        echo "<td class='text-center'>{$datos->monto_total}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>