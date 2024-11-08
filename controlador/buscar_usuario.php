<?php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];

// Sanitize input
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);

// Si query es '%', significa que debe mostrar todos los registros
$sqlQuery = $query === '%' ? "SELECT * FROM clientes" : "SELECT * FROM clientes WHERE $campo LIKE '$query%'";

$sql = $conexion->query($sqlQuery);

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_cliente}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_cliente}</th>";
        echo "<td class='text-center'>{$datos->nombre}</td>";
        echo "<td class='text-center'>{$datos->apellido_paterno}</td>";
        echo "<td class='text-center'>{$datos->apellido_materno}</td>";
        echo "<td class='text-center'>{$datos->email}</td>";
        echo "<td class='text-center'>{$datos->clave_lada}</td>";
        echo "<td class='text-center'>{$datos->telefono}</td>";
        echo "<td class='text-center descripcion'>{$datos->fecha_registro}</td>";
        echo "<td class='text-center'>{$datos->contraseña}</td>";
        echo                     "<td class='text-center'>
                                    <img src='{$datos->img}' alt='Imagen del Usuario' style='width: 100px; height: 60px;'>
                                </td>";
        echo "<td class='text-center'>
                                        <button type='button' class='btn btn-success' data-bs-toggle='modal' data-bs-target='#banco' data-id='<?= $datos->id_cliente ?>'>Banco</button>
                                    </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
