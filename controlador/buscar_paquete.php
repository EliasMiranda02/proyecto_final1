<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM paquetes" : "SELECT * FROM paquetes WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {

    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
            echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_paquete}'></td>";
            echo "<th scope='row' class='text-center'>{$datos->id_paquete}</th>";
            echo "<td class='text-center'>{$datos->numero_paquete}</td>";
            echo "<td class='text-center'>{$datos->nombre}</td>";
            echo "<td class='text-center descripcion'>{$datos->descripcion}</td>";
            echo "<td class='text-center'>{$datos->precio_aproximado}</td>";
            echo "<td class='text-center'>{$datos->duracion_dias}</td>";
            echo "<td class='text-center'>{$datos->destino}</td>";
            echo "<td class='text-center'>{$datos->fecha_creacion}</td>";
            echo "<td class='text-center'>{$datos->fecha_modificacion}</td>";
            echo "<td class='text-center'>
                    <button type='button' class='btn btn-secondary itinerarios-button' data-bs-toggle='modal' data-bs-target='#banco' data-id='{$datos->id_paquete}'>Itinerarios</button>
                </td>";
        echo "</tr>";
    }
    
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
?>
