<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? 
    "SELECT c.id_cliente, c.nombre, c.apellido_paterno, c.apellido_materno, c.email, cal.id_calificacion, cal.promedio_calificacion, cal.comentario
     FROM clientes c
     JOIN calificaciones cal ON c.id_cliente = cal.id_cliente" : 
    "SELECT c.id_cliente, c.nombre, c.apellido_paterno, c.apellido_materno, c.email, cal.id_calificacion, cal.promedio_calificacion, cal.comentario
     FROM clientes c
     JOIN calificaciones cal ON c.id_cliente = cal.id_cliente 
     WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='hidden' name='ids[]' value='{$datos->id_calificacion}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_calificacion}</th>";
        echo "<td class='text-center'>{$datos->id_cliente}</td>";
        echo "<td class='text-center'>{$datos->nombre}</td>";
        echo "<td class='text-center'>{$datos->apellido_paterno}</td>";
        echo "<td class='text-center'>{$datos->apellido_materno}</td>";
        echo "<td class='text-center'>{$datos->email}</td>";
        echo "<td class='text-center'>{$datos->promedio_calificacion}</td>";
        echo "<td class='descripcion text-center'>{$datos->comentario}</td>";
        
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>