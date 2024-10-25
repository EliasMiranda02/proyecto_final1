<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta sea correcta

if (isset($_GET['id_cliente'])) {
    $id_cliente = $_GET['id_cliente'];
    
    // Consulta con JOIN para obtener los datos bancarios del cliente seleccionado
    $query = $conexion->prepare("
        SELECT datos_bancarios.*
        FROM datos_bancarios
        JOIN clientes ON datos_bancarios.id_cliente = clientes.id_cliente
        WHERE clientes.id_cliente = ?
    ");
    $query->bind_param("s", $id_cliente); // Evita inyección SQL
    $query->execute();
    $result = $query->get_result();
    
    $datos = [];
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }

    echo json_encode($datos); // Devuelve los datos en formato JSON
}
?>
