<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT p.numero_paquete, p.nombre AS nombre_paquete, p.destino, pp.precio_total, pp.id_precio
                            FROM paquetes p
                            JOIN paquetes_precios pp ON p.id_paquete = pp.id_paquete" : "SELECT p.numero_paquete, p.nombre AS nombre_paquete, p.destino, pp.precio_total, pp.id_precio
                            FROM paquetes p
                            JOIN paquetes_precios pp ON p.id_paquete = pp.id_paquete WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_precio}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->numero_paquete}</th>";
        echo "<td class='text-center'>{$datos->nombre_paquete}</td>";
        echo "<td class='text-center'>{$datos->destino}</td>";
        echo "<td class='text-center'>{$datos->precio_total}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>