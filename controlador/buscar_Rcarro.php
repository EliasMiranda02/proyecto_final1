<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM renta_carros" : "SELECT * FROM renta_carros WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
        echo '<thead class="">';
        echo '    <tr>';
        echo '        <th scope="col" class="text-center encabezado"></th>';
        echo '        <th scope="col" class="text-center encabezado">Código</th>';
        echo '        <th scope="col" class="text-center encabezado">Origen</th>';
        echo '        <th scope="col" class="text-center encabezado">Destino</th>';
        echo '        <th scope="col" class="text-center encabezado">Distancia</th>';
        echo '        <th scope="col" class="text-center encabezado">Duración</th>';
        echo '        <th scope="col" class="text-center encabezado">Matricula</th>';
        echo '    </tr>';
        echo '</thead>';

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_renta}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_renta}</th>";
        echo "<td class='text-center'>{$datos->id_carro}</td>";
        echo "<td class='text-center'>{$datos->fecha_renta}</td>";
        echo "<td class='text-center'>{$datos->fecha_devolucion}</td>";
        echo "<td class='text-center'>{$datos->estado_renta}</td>";
        echo "<td class='text-center'>{$datos->dias_rentados}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>