<?php
require "../modelo/conexion.php";

$action = $_POST['action'] ?? '';

if ($action == 'getOrigenes') {
    $query = "SELECT DISTINCT origen FROM vuelos";
    $result = $conexion->query($query);
    $origenes = [];
    while ($row = $result->fetch_assoc()) {
        $origenes[] = $row['origen'];
    }
    echo json_encode($origenes);
}

if ($action == 'getDestinos') {
    $origen = $_POST['origen'] ?? '';
    $query = "SELECT DISTINCT destino FROM vuelos WHERE origen = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("s", $origen);
    $stmt->execute();
    $result = $stmt->get_result();
    $destinos = [];
    while ($row = $result->fetch_assoc()) {
        $destinos[] = $row['destino'];
    }
    echo json_encode($destinos);
}

if ($action == 'getVuelo') {
    $origen = $_POST['origen'] ?? '';
    $destino = $_POST['destino'] ?? '';
    $query = "SELECT id_vuelo, numero_vuelo, precio_vuelo, hora_salida FROM vuelos WHERE origen = ? AND destino = ?";
    $stmt = $conexion->prepare($query);
    $stmt->bind_param("ss", $origen, $destino);
    $stmt->execute();
    $result = $stmt->get_result();
    $vuelo = $result->fetch_assoc();
    echo json_encode($vuelo);
}

?>
