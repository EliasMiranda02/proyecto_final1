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
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_recorrido}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_recorrido}</th>";
        echo "<td scope='row' class='text-center'>{$datos->id_ruta}</td>";
        echo "<td class='text-center'>{$datos->fecha_salida}</td>";
        echo "<td class='text-center'>{$datos->fecha_llegada}</td>";
        echo "<td class='text-center'>{$datos->precio_boleto}</td>";
        echo "<td class='text-center'>{$datos->estado}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='7' class='text-center'>No se encontraron resultados.</td></tr>";
}


$conexion->close();
?>
