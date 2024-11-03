<?php
include "../modelo/conexion.php"; // Asegúrate de que la ruta sea correcta

if (isset($_GET['id_paquete'])) {
    $id_paquete = $_GET['id_paquete'];
    
    // Consulta con JOIN para obtener los itinerarios del paquete seleccionado
    $query = $conexion->prepare("
        SELECT itinerarios.*
        FROM itinerarios
        JOIN paquetes ON itinerarios.id_paquete = paquetes.id_paquete
        WHERE paquetes.id_paquete = ?
    ");
    $query->bind_param("s", $id_paquete); // Evita inyección SQL
    $query->execute();
    $result = $query->get_result();
    
    $datos = [];
    while ($row = $result->fetch_assoc()) {
        $datos[] = $row;
    }

    echo json_encode($datos); // Devuelve los datos en formato JSON
}
?>
