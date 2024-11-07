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
        echo "<th scope='row' class='text-center'>{$datos->id_excursion}</th>";
        echo "<td class='text-center descripcion'>{$datos->descripcion}</td>";
        echo "<td class='text-center'>{$datos->precio}</td>";
        echo "<td class='text-center'>{$datos->duracion_horas}</td>";
        echo "<td class='text-center'>{$datos->ubicacion}</td>";
        echo "<td class='text-center'>{$datos->clasificacion}</td>";
        echo "<td class='text-center'>{$datos->fecha_creacion}</td>";
        echo "<td class='text-center'>{$datos->fecha_modificacion}</td>
        <td class='text-center'>
                                            <img src='{$datos->img}' alt='Imagen del empleado' style='width: 100px; height: 60px;'>
                                        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>