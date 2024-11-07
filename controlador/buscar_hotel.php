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
        echo "<th scope='row'>{$datos->id_hotel}</th>";
        echo "<td>{$datos->nombre_hotel}</td>";
        echo "<td>{$datos->direccion}</td>";
        echo "<td>{$datos->clave_lada}</td>";
        echo "<td>{$datos->telefono}</td>";
        echo "<td>{$datos->correo_electronico}</td>";
        echo "<td>{$datos->numero_habitaciones}</td>";
        echo "<td>{$datos->descripcion}</td>";
        echo "<td>{$datos->precio_noche}</td>";
        echo "<td>{$datos->calificacion}</td>
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