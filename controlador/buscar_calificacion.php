<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM calificaciones" : "SELECT * FROM calificaciones WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='hidden' name='ids[]' value='{$datos->id_calificacion}'></td>";
        echo "<th scope='row'>{$datos->id_calificacion}</th>";
        echo "<td>{$datos->id_cliente}</td>";
        echo "<td>{$datos->promedio_calificacion}</td>";
        echo "<td>{$datos->comentario}</td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>