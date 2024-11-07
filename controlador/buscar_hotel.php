<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM hoteles" : "SELECT * FROM hoteles WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_hotel}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_hotel}</th>";
        echo "<td class='text-center'>{$datos->nombre_hotel}</td>";
        echo "<td class='text-center descripcion'>{$datos->direccion}</td>";
        echo "<td class='text-center'>{$datos->clave_lada}</td>";
        echo "<td class='text-center'>{$datos->telefono}</td>";
        echo "<td class='text-center'>{$datos->correo_electronico}</td>";
        echo "<td class='text-center'>{$datos->numero_habitaciones}</td>";
        echo "<td class='text-center descripcion'>{$datos->descripcion}</td>";
        echo "<td class='text-center'>{$datos->precio_noche}</td>";
        echo "<td class='text-center'>{$datos->calificacion}</td>";
        echo                     "<td class='text-center'>
                                    <img src='{$datos->img}' alt='Imagen del hotel' style='width: 100px; height: 60px;'>
                                </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>