<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM excursiones" : "SELECT * FROM excursiones WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_excursion}'></td>";
        echo "<th scope='row'>{$datos->id_excursion}</th>";
        echo "<td>{$datos->nombre}</td>";
        echo "<td>{$datos->descripcion}</td>";
        echo "<td>{$datos->precio_aproximado}</td>";
        echo "<td>{$datos->duracion_horas}</td>";
        echo "<td>{$datos->ubicacion}</td>";
        echo "<td>{$datos->clasificacion}</td>";
        echo "<td>{$datos->cantidad_maxima}</td>";
        echo "<td>{$datos->porcentaje_descuento}</td>";
        echo "<td>{$datos->precio_porcentaje}</td>";
        echo "<td>{$datos->fecha_creacion}</td>";
        echo "<td>{$datos->fecha_modificacion}</td>";
        echo "<td>{$datos->disponibilidad}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>