<?php
// buscar_empleados.php
include "../modelo/conexion.php";

$campo = $_POST['campo'];
$query = $_POST['query'];
$cargo = $_POST['cargo']; // Obtener el cargo desde el formulario

// Sanitiza los datos para evitar inyecciones SQL
$campo = $conexion->real_escape_string($campo);
$query = $conexion->real_escape_string($query);
$cargo = $conexion->real_escape_string($cargo); // Sanitiza el cargo

$sqlQuery = $query === '%' ? "SELECT * FROM empleados" : "SELECT * FROM empleados WHERE $campo LIKE '$query%' AND cargo = '$cargo'";
// Realiza la consulta
$sql = $conexion->query("SELECT * FROM empleados WHERE $campo LIKE '$query%' AND cargo = '$cargo'");

if ($sql->num_rows > 0) {
    while ($datos = $sql->fetch_object()) {
        echo "<tr>";
        echo "<td><input type='checkbox' name='ids[]' value='{$datos->id_empleado}'></td>";
        echo "<th scope='row' class='text-center'>{$datos->id_empleado}</th>";
        echo "<td class='text-center'>{$datos->nombre}</td>";
        echo "<td class='text-center'>{$datos->apellido_paterno}</td>";
        echo "<td class='text-center'>{$datos->apellido_materno}</td>";
        echo "<td class='text-center'>{$datos->email}</td>";
        echo "<td class='text-center'>{$datos->clave_lada}</td>";
        echo "<td class='text-center'>{$datos->telefono}</td>";
        echo "<td class='text-center'>{$datos->fecha_registro}</td>";
        echo "<td class='text-center'>{$datos->contraseña}</td>";
        echo "<td class='text-center'>{$datos->nombre_usuario}</td>";
        echo "<td class='text-center'>{$datos->NIP}</td>";
        echo "<td class='text-center'>{$datos->cargo}</td>";
        echo "<td class='text-center'>{$datos->disponibilidad}</td>
                                        <td class='text-center'>
                                            <img src='{$datos->img}' alt='Imagen del empleado' style='width: 100px; height: 60px;'>
                                        </td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();
