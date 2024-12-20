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
    echo '        <th scope="col" class="encabezado"></th>';
    echo '        <th scope="col" class="text-center encabezado">Código</th>';
    echo '        <th scope="col" class="text-center encabezado">Modelo</th>';
    echo '        <th scope="col" class="text-center encabezado">Precio de Renta</th>';
    echo '        <th scope="col" class="text-center encabezado">Capacidad</th>';
    echo '        <th scope="col" class="text-center encabezado">Estado</th>';
    echo '        <th scope="col" class="text-center encabezado">Foto</th>';
    echo '    </tr>';
    echo '</thead>';
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_carro}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_carro}</th>";
        echo "<td class='text-center'>{$datos->modelo}</td>";
        echo "<td class='text-center'>" . '$' . number_format($datos->precio_renta,2) ."</td>";
        echo "<td class='text-center'>{$datos->capacidad}</td>";
        echo "<td class='text-center'>{$datos->estado}</td>";
        echo "<td class='text-center'>
                                    <img src='{$datos->img}' alt='Imagen del Carro' style='width: 100px; height: 60px;'>
                                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>