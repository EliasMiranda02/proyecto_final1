<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM reservas_ea" : "SELECT * FROM reservas_ea WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='hidden' name='ids[]' value='{$datos->id_reservaea}'></td>";
        echo "<th scope='row'>{$datos->id_reservaea}</th>";
        echo "<td>{$datos->id_cliente}</td>";
        echo "<td>{$datos->id_recorrido}</td>";
        echo "<td>{$datos->id_paquete}</td>";
        echo "<td>{$datos->fecha_reserva }</td>";
        echo "<td>{$datos->estado_reserva}</td>";
        echo "<td>{$datos->lugar_salida}</td>";
        echo "<td>{$datos->hora_salida}</td>";
        echo "<td>{$datos->fecha_salida }</td>";
        echo "<td>{$datos->cantidad_asientos }</td>";
        echo "<td>{$datos->precio_excursion}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>