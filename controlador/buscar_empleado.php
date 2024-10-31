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
        echo "<th scope='row'>{$datos->id_empleado}</th>";
        echo "<td>{$datos->nombre}</td>";
        echo "<td>{$datos->apellido_paterno}</td>";
        echo "<td>{$datos->apellido_materno}</td>";
        echo "<td>{$datos->email}</td>";
        echo "<td>{$datos->clave_lada}</td>";
        echo "<td>{$datos->telefono}</td>";
        echo "<td>{$datos->fecha_registro}</td>";
        echo "<td>{$datos->contraseña}</td>";
        echo "<td>{$datos->nombre_usuario}</td>";
        echo "<td>{$datos->NIP}</td>";
        echo "<td>{$datos->cargo}</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13' class='text-center'>No se encontraron resultados.</td></tr>";
}

$conexion->close();

?>
