<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM reservas_pa" : "SELECT * FROM reservas_pa WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_reservapa}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_reservapa}</th>";
        echo "<td class='text-center'>{$datos->id_recorrido}</td>";
        echo "<td class='text-center'>{$datos->id_paquete}</td>";
        echo "<td class='text-center'>{$datos->fecha_reserva }</td>";
        echo "<td class='text-center'>{$datos->estado_reserva}</td>";
        echo "<td class='text-center'>{$datos->lugar_salida}</td>";
        echo "<td class='text-center'>{$datos->hora_salida}</td>";
        echo "<td class='text-center'>{$datos->fecha_salida }</td>";
        echo "<td class='text-center'>{$datos->cantidad_asientos }</td>";
        echo "<td class='text-center'>{$datos->precio_paquete}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>